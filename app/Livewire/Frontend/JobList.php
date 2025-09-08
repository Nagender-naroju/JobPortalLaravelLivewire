<?php

namespace App\Livewire\Frontend;

use App\Models\Frontend\CategoryModel;
use App\Models\Frontend\JobModel;
use App\Models\Frontend\JobsApplied;
use App\Models\Frontend\JobTypesModel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class JobList extends Component
{
    use WithPagination;

    public $view = "job-list";
    public $selectedJobId = null;
    public $selectedJob = null;

    public $name;
    public $designation;
    public $search = '';

    public $categories = [];
    public $job_types = [];
    public $user_id;

    protected $queryString = ['search'];
    public $applicants;
    public $application_id;
    public $role;

    // Reset pagination when typing
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount()
    {
        if(Auth::check())
        {
            $this->name = Auth::user()->name ?? null;
            $this->designation = Auth::user()->designation ?? null;
            $this->user_id = Auth::user()->id;
            $this->role = Auth::user()->role;
        }else{
            session()->flash('error',"Please login to view jobs");
            return;
        }

        $this->categories = CategoryModel::where('status', '1')->get();
        $this->job_types = JobTypesModel::where('status', '1')->get();
    }

    public function switchView($view, $jobId = null)
    {
        $this->view = $view;
        if ($jobId) {
            $this->selectedJobId = $jobId;
            $this->loadJobDetails($jobId);
            $this->loadApplicants($jobId);
        }
    }

    public function loadApplicants($jobId)
    {
        try{
            if(!Auth::check())
            {
                session()->flash('error',"Please login to view applicants");
                return;
            }
            $this->applicants = JobsApplied::with(['userData'])->where(['job_id'=>$jobId])->get();
        }catch(Exeption $e){
            session()->flash('error',$e->getMessage());
            return;
        }
    }

    public function updateApplicationStatus($applicationId, $status)
    {
        try {
            $application = JobsApplied::find($applicationId);
            
            if (!$application) {
                session()->flash('error', 'Application not found');
                return;
            }

            // Verify the job belongs to the current user
            $job = JobModel::where('id', $application->job_id)
                          ->where('user_id', $this->user_id)
                          ->first();
            
            if (!$job) {
                session()->flash('error', 'You do not have permission to update this application');
                return;
            }

            $application->status = $status;
            $application->save();
            
            session()->flash('success', 'Application status updated to ' . ucfirst($status));
            
            // Reload applicants
            if ($this->selectedJobId) {
                $this->loadApplicants($this->selectedJobId);
            }
            
        } catch (Exception $e) {
            session()->flash('error', 'Error updating application: ' . $e->getMessage());
        }
    }

    public function loadJobDetails($jobId)
    {
        $this->selectedJob = JobModel::with(['category', 'job_types'])
            ->where('id', $jobId)
            ->where('user_id', $this->user_id) 
            ->first();
    }

    public function backToJobList()
    {
        $this->view = 'job-list';
        $this->selectedJobId = null;
        $this->selectedJob = null;
    }

    public function remove_job($job_id)
    {
        $job = JobModel::where('id', $job_id)
            ->where('user_id', $this->user_id)
            ->first();

        if ($job) {
            $job->delete();
            session()->flash('success', 'Job deleted successfully!');
            
            // If we're viewing the deleted job's details, go back to list
            if ($this->selectedJobId == $job_id) {
                $this->backToJobList();
            }
        } else {
            session()->flash('error', 'Job not found or you do not have permission to delete it.');
        }
    }

    public function render()
    {
       
        $jobs = JobModel::with(['category', 'job_types'])
            ->where('status', 1)
            ->where('user_id',$this->user_id)
            ->when($this->search, function ($query) {
                $query->where(function ($sub) {
                    $sub->where('title', 'like', '%' . $this->search . '%')
                         ->orWhere('location', 'like', '%' . $this->search . '%')
                         ->orWhereHas('job_types', fn($q) =>
                             $q->where('name', 'like', '%' . $this->search . '%'));
                });
            })
            ->orderBy('id','DESC')
            ->paginate(5);

        return view('livewire.frontend.'.$this->view, [
            'jobs' => $jobs
        ])->extends('welcome')->section('content');
    }
}
