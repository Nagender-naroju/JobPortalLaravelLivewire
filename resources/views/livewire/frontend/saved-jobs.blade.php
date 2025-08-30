<div>
<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Saved Jobs</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="card border-0 shadow mb-4 p-3">
                    <div class="s-body text-center mt-3">
                        <img src="assets/images/avatar7.png" alt="avatar"  class="rounded-circle img-fluid" style="width: 150px;">
                        <h5 class="mt-3 pb-0">Mohit Singh</h5>
                        <p class="text-muted mb-1 fs-6">Full Stack Developer</p>
                        <div class="d-flex justify-content-center mb-2">
                            <button data-bs-toggle="modal" data-bs-target="#exampleModal" type="button" class="btn btn-primary">Change Profile Picture</button>
                        </div>
                    </div>
                </div>
                <div class="card account-nav border-0 shadow mb-4 mb-lg-0">
                    <x-account-nav />
                </div>
            </div>
            
            <!-- Confirmation Modal -->
            <div class="modal fade" id="confirmRemoveModal" tabindex="-1" aria-labelledby="confirmRemoveModalLabel" aria-hidden="true" wire:ignore.self>
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirm Removal</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to remove this from saved jobs ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger" wire:click="remove_job" data-bs-dismiss="modal">Yes, Remove</button>
                    </div>
                    </div>
                </div>
            </div>



            <div class="col-lg-9">
                <div class="card border-0 shadow mb-4 p-3">
                    <div class="card-body card-form">
                        <h3 class="fs-4 mb-1">Saved Jobs</h3>
                        <div class="table-responsive">
                            <table class="table ">
                                <thead class="bg-light">
                                    <tr>
                                        <th scope="col">Title</th>
                                        <th scope="col">Job Created</th>
                                        <th scope="col">Applicants</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="border-0">
                                    @forelse ($saved as $job)
                                        <tr class="active">
                                            <td>
                                                <div class="job-name fw-500">{{ $job->jobData->title }}</div>
                                                <div class="info1">{{ $job->jobData->job_types->name  }}.{{ $job->jobData->location }}</div>
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($job->jobData->created_at)->format('d M, Y') }}</td>
                                            <td>{{ $job->jobData->applications_count ?? 0 }} Applications</td>
                                            
                                            <td>
                                                <div class="action-dots float-end">
                                                    <a href="#" class="" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item" href="#" wire:click="viewJob({{ $job->job_id }})"> <i class="fa fa-eye" aria-hidden="true"></i> View</a></li>
                                                        <!-- <li><a class="dropdown-item" href="#" wire:click="remove_job({{ $job->id }})"><i class="fa fa-trash" aria-hidden="true"></i> Remove</a></li> -->
                                                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#confirmRemoveModal" wire:click="$set('jobToRemoveId', {{ $job->id }})">
                                                            <i class="fa fa-trash" aria-hidden="true"></i> Remove
                                                        </a>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>  
                                    @empty
                                        <tr class="active">
                                            <td class="text-center">No Data Found</td>
                                        </tr>
                                    @endforelse
                            </table>
                            <div>
                            {{ $saved->links() }}
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</section>
</div>
