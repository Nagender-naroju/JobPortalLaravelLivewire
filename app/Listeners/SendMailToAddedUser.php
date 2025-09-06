<?php

namespace App\Listeners;

use App\Events\JobPostAdded;
use App\Mail\AppliedResponse;
use App\Mail\JobPostedMail;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendMailToAddedUser
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(JobPostAdded $event): void
    {
        $user_id = $event->jobData->user_id;
        $PostedUser = User::where('id',$user_id)->first();
        Mail::to($PostedUser->email)->queue(new JobPostedMail($PostedUser,$event->jobData));
    }
}
