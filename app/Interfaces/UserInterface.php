<?php

namespace App\Interfaces;

interface UserInterface
{
    public function userJobs();
    public function findJobById(int $jobId);
    public function jobApplicants(int $jobId);
    public function jobsApplied();
    public function savedJobs($user_id);
    public function checkApplication($application_id,$job_id);
    public function changestatus($application_id,$job_id,$status);
}
