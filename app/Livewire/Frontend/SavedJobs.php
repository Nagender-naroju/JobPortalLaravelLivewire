<?php

namespace App\Livewire\Frontend;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Frontend\SavedJobs as jobsSaved;
use App\Models\Frontend\JobModel;

class SavedJobs extends Component
{
    use WithPagination;
    public $user_id;
    public $default_view = 'saved-jobs';
    public $jobs_saved;

    public $single_job;

    public $jobToRemoveId;

    public function mount()
    {
        if(Auth::check())
        {
            $this->user_id = Auth::user()->id;
        }else{
            session()->flash('error', 'Please login to view saved jobs');
            return;
        }
       
    }

    public function viewJob($jobId)
    {
        // Validate input
        if (!is_numeric($jobId)) {
            $this->addError('job', 'Invalid job ID');
            return;
        }

        // Check if user has saved this job and load it
        $savedJob = jobsSaved::where('user_id', $this->user_id)
                           ->where('job_id', $jobId)
                           ->with('jobData')
                           ->first();

        if (!$savedJob || !$savedJob->jobData) {
            session()->flash('error', 'Job not found or no longer available');
            return;
        }

        $this->single_job = $savedJob->jobData;
        $this->default_view = 'saved-view';
    }


    public function remove_job()
    {
        $savedJob = jobsSaved::where('user_id', $this->user_id)
                           ->where('id', $this->jobToRemoveId)
                           ->first();
        if (!$savedJob) {
            session()->flash('error', 'Job not found or no longer available');
            return;
        }

        $savedJob->delete();
        session()->flash('success', 'Job Removed Successfully');
    }


    public function render()
    {
        $saved = jobsSaved::with([
            'userData',
            'jobData' => function ($query) {
                $query->withCount('applications');
            }
        ])->where('user_id',$this->user_id)->orderBy('id',"DESC")->paginate(5);

        return view('livewire.frontend.'.$this->default_view,['saved'=>$saved])->extends('welcome')->section('content');
    }
}
