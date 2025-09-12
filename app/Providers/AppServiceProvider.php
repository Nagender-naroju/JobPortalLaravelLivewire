<?php

namespace App\Providers;


use App\Events\JobPostAdded;
use App\Interfaces\UserInterface;
use App\Listeners\SendMailToAddedUser;
use App\Listeners\SendMailToAllUsersAboutJobPost;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserInterface::class,UserRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Event::listen(JobPostAdded::class,SendMailToAddedUser::class,);
        Event::listen(JobPostAdded::class,SendMailToAllUsersAboutJobPost::class,);

    }
}
