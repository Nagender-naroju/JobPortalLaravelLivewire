<?php

namespace App\Observers;

use App\Mail\AppliedResponse;
use App\Models\Frontend\JobsApplied;
use Illuminate\Support\Facades\Mail;

class JobApplications
{
    /**
     * Handle the JobsApplied "created" event.
     */
    public function created(JobsApplied $jobsApplied): void
    {
       $userEmail = $jobsApplied->userData->email;
       $user = $jobsApplied->userData;
       $job_data = $jobsApplied->jobData;

       Mail::to($userEmail)->queue(new AppliedResponse($user,$job_data));
    }

    /**
     * Handle the JobsApplied "updated" event.
     */
    public function updated(JobsApplied $jobsApplied): void
    {
        //
    }

    /**
     * Handle the JobsApplied "deleted" event.
     */
    public function deleted(JobsApplied $jobsApplied): void
    {
        //
    }

    /**
     * Handle the JobsApplied "restored" event.
     */
    public function restored(JobsApplied $jobsApplied): void
    {
        //
    }

    /**
     * Handle the JobsApplied "force deleted" event.
     */
    public function forceDeleted(JobsApplied $jobsApplied): void
    {
        //
    }
}
