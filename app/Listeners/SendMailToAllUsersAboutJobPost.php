<?php

namespace App\Listeners;

use App\Events\JobPostAdded;
use App\Mail\NewJobPostedMail;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendMailToAllUsersAboutJobPost
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

        // Chunking to avoid memory issues with large user lists
        User::where('id', '!=', $user_id)->chunk(100, function ($users) use ($event) {
            foreach ($users as $user) {
                Mail::to($user->email)->queue(new NewJobPostedMail($user, $event->jobData));
            }
        });
    }
}
