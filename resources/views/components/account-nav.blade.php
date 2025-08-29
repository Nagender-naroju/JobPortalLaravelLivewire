<div class="card-body p-0">
    <ul class="list-group list-group-flush ">
        <li class="list-group-item d-flex justify-content-between p-3">
            <a href="{{ route('account.settings') }}" wire:navigate>Account Settings</a>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
            <a href="{{ route('job.post') }}"  wire:navigate>Post a Job</a>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
            <a href="{{ route('my.jobs') }}"  wire:navigate>My Jobs</a>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
            <a href="{{ route('job.applications') }}" wire:navigate>Jobs Applied</a>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
            <a href="{{ route('saved.jobs') }}" wire:navigate>Saved Jobs</a>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
            <a href="#" wire:click.prevent="logout()">Logout</a>
        </li>                                                       
    </ul>
</div>