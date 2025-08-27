<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use App\Models\Frontend\CategoryModel;
use App\Models\Frontend\JobTypesModel;
use App\Models\Frontend\JobModel;

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

    // Reset pagination when typing
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount()
    {
        $this->name = Auth::user()->name ?? null;
        $this->designation = Auth::user()->designation ?? null;
        $this->user_id = Auth::user()->id;

        $this->categories = CategoryModel::where('status', '1')->get();
        $this->job_types = JobTypesModel::where('status', '1')->get();
    }

    public function switchView($view, $jobId = null)
    {
        $this->view = $view;
        if ($jobId) {
            $this->selectedJobId = $jobId;
            $this->loadJobDetails($jobId);
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
            ->paginate(5);

        return view('livewire.frontend.'.$this->view, [
            'jobs' => $jobs
        ])->extends('welcome')->section('content');
    }
}
