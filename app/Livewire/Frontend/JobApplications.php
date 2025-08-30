<?php

namespace App\Livewire\Frontend;

use App\Models\Frontend\JobModel;
use App\Models\Frontend\JobsApplied;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class JobApplications extends Component
{
 
    public $defaultView = "job-applications";
    public $user_id;
    public $jobDetails;

    public function mount()
    {
        $this->user_id = Auth::user()->id;
    }

    public function viewJob($application_id)
    {
        try {
            $id = $application_id;

            $applicationData = JobsApplied::where('id', $id)->first();
            
            if (empty($applicationData)) {
                session()->flash('error', 'Application Not Found');
                return; 
            }
            
            $this->jobDetails = JobModel::where('id', $applicationData->job_id)->first();
            $this->defaultView = 'application-info';
            if (empty($this->jobDetails)) {
                session()->flash('error', 'Job details not found');
                return;
            }
            
        } catch (Exception $e) { // Fixed exception syntax
            session()->flash('error', $e->getMessage());
        }
    }

    public function render()
    {
        $applications = JobsApplied::with([
            'userData',
            'jobData' => function ($query) {
                $query->withCount(['applications' => function ($countQuery) {
                    $countQuery->where('user_id', '!=', $this->user_id);
                }]);
            }
        ])->where('user_id', $this->user_id)->paginate(5);
        return view('livewire.frontend.'.$this->defaultView,['applications'=>$applications])->extends('welcome')->section('content');
    }
}
