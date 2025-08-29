<?php

namespace App\Livewire\Frontend;

use App\Models\Frontend\JobsApplied;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class JobApplications extends Component
{
 
    public $defaultView = "job-applications";
    public $user_id;

    public function mount()
    {
        $this->user_id = Auth::user()->id;
    }

    public function render()
    {
        $applications = JobsApplied::with([
            'userData',
            'jobData' => function ($query) {
                $query->withCount('applications');
            }
        ])->where('user_id',$this->user_id)->paginate(5);
        return view('livewire.frontend.'.$this->defaultView,['applications'=>$applications])->extends('welcome')->section('content');
    }
}
