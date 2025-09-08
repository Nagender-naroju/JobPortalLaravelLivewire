<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Frontend\JobModel;
use Illuminate\Http\Request;

class AddedJobs extends Controller
{
    public function index()
    {
        return view('Admin.posted-jobs');
    }

    public function job_view($id)
    {
        $jobData = JobModel::with(['job_types','applications'])->where('id',$id)->first();
        $currentNav = 'added-jobs';
        return view('Admin.job-info',compact('jobData','currentNav'));
    }

    public function changeStatus(Request $request)
    {
        $postId = $request->input('postId');
        $status = (int) $request->input('status');

        // Optional: validate input
        if (!in_array($status, [1, 2, 3])) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid status value.'
            ], 400);
        }

        $jobData = JobModel::find($postId);

        if ($jobData) {
            $jobData->status = $status;
            $jobData->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Status updated successfully.'
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Job not found.'
            ], 404);
        }
    }

}
