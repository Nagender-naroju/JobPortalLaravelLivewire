<?php

namespace App\Services;

use App\Interfaces\UserInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserServices
{
    public $userInterface;
    /**
     * Create a new class instance.
     */
    public function __construct(UserInterface $userInterface)
    {
       $this->userInterface = $userInterface;
    }

    public function userJobs()
    {
       return $this->userInterface->userJobs();
    }

    public function jobApplicants($jobId)
    {
        $job = $this->userInterface->findJobById($jobId);

        if (!$job) {
            throw new \Illuminate\Database\Eloquent\ModelNotFoundException("Job not found.");
        }

        if ($job->user_id !== Auth::id()) {
            throw new \Illuminate\Auth\Access\AuthorizationException("Unauthorized");
        }

        return $this->userInterface->jobApplicants($jobId);
    }

    public function appliedJobs()
    {
        return $this->userInterface->jobsApplied();
    }

    public function userSavedJobs($user_id)
    {
        return $this->userInterface->savedJobs($user_id);
    }

    public function changestatus($application_id,$job_id,$status)
    {
        $job = $this->userInterface->findJobById($job_id);

        if (!$job) {
            throw new \Illuminate\Database\Eloquent\ModelNotFoundException("Job not foundddd.");
        }
        if ($job->user_id !== Auth::id()) {
            throw new \Illuminate\Auth\Access\AuthorizationException("Unauthorized");
        }

        $applicationCheck = $this->userInterface->checkApplication($application_id,$job_id);

        if (!$applicationCheck) {
            throw new \Illuminate\Database\Eloquent\ModelNotFoundException("Application not found.");
        }

        return $this->userInterface->changestatus($application_id,$job_id,$status);
    }

}
