<?php

namespace App\Repositories;

use App\Interfaces\UserInterface;
use App\Models\Frontend\JobModel;
use App\Models\Frontend\JobsApplied;
use App\Models\Frontend\SavedJobs;
use Illuminate\Support\Facades\Auth;

class UserRepository implements UserInterface
{
    public function userJobs()
    {
        $userId = Auth::id(); 
        return JobModel::with(['category', 'job_types', 'users'])->withCount('applications')->where('user_id', $userId)->orderBy('id', 'DESC')->paginate(10);
    }

    public function findJobById($jobId)
    {
        return JobModel::find($jobId);
    }

    public function jobApplicants($jobId)
    {
        return JobsApplied::with(['userData', 'jobData'])->where('job_id', $jobId)->orderBy('id', 'DESC')->paginate(10);
    }

    public function jobsApplied()
    {
        $userId = Auth::user()->id;
        return JobsApplied::with(['jobData.users'])->where('user_id',$userId)->orderBy('id','DESC')->paginate(10);
    }

    public function savedJobs($user_id)
    {
        return  SavedJobs::with(['jobData.users'])->where('user_id', $user_id)->orderBy('id', 'DESC')->paginate(10);
    }

    public function checkApplication($application_id,$job_id)
    {
        return JobsApplied::where('id', $application_id)->where('job_id', $job_id)->first();
    }

    public function changestatus($application_id,$job_id,$status)
    {
        $application = JobsApplied::where('id', $application_id)->where('job_id', $job_id)->first();
        $application->status = $status;
        $application->save();
        return $application; 
    }
}
