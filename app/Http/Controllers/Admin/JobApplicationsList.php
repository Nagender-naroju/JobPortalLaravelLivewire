<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Frontend\JobModel;
use Illuminate\Http\Request;

class JobApplicationsList extends Controller
{
    public function index()
    {
        return view('Admin.job-applications');
    }

    public function job_view($id)
    {
        $jobData = JobModel::with(['job_types','applications'])->where('id',$id)->first();
        $currentNav = 'job-applications';
        return view('Admin.job-info',compact('jobData','currentNav'));
    }
}
