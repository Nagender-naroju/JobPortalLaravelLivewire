<div>
<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active">My Jobs</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="card border-0 shadow mb-4 p-3">
                    <div class="s-body text-center mt-3">
                        <img src="assets/images/avatar7.png" alt="avatar"  class="rounded-circle img-fluid" style="width: 150px;">
                        <h5 class="mt-3 pb-0">{{ $name }}</h5>
                        <p class="text-muted mb-1 fs-6">{{ $designation }}</p>
                        <div class="d-flex justify-content-center mb-2">
                            <button data-bs-toggle="modal" data-bs-target="#exampleModal" type="button" class="btn btn-primary">Change Profile Picture</button>
                        </div>
                    </div>
                </div>
                <div class="card account-nav border-0 shadow mb-4 mb-lg-0">
                    <x-account-nav />
                </div>
            </div>
            <div class="col-lg-9">
                {{-- Success Message --}}
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fa fa-check-circle me-2"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                {{-- Error Message --}}
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fa fa-exclamation-circle me-2"></i>
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                <div class="card border-0 shadow mb-4 p-3">
                    <div class="card-body card-form">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h3 class="fs-4 mb-1">My Jobs</h3>
                            </div>
                            <div style="margin-top: -10px;">
                               <input 
                                   type="text" 
                                   name="search" 
                                   wire:model.live="search" 
                                   placeholder="Search jobs..." 
                                   class="form-control d-inline-block" 
                                   style="width: 200px; display: inline-block; margin-right: 10px;"
                               >
                                <a href="{{ route('job.post') }}" wire:navigate  class="btn btn-primary">Post a Job</a>
                            </div>
                        </div>
                        
                        {{-- Loading indicator --}}
                        <div wire:loading wire:target="search" class="text-center py-2">
                            <div class="spinner-border spinner-border-sm" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <span class="ms-2">Searching...</span>
                        </div>

                        <div class="table-responsive">
                            <table class="table">
                                <thead class="bg-light">
                                    <tr>
                                        <th scope="col">Title</th>
                                        <th scope="col">Job Created</th>
                                        <th scope="col">Applicants</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="border-0">
                                    @forelse ($jobs as $row)
                                        <tr class="active">
                                            <td>
                                                <div class="job-name fw-500">{{ $row->title }}</div>
                                                <div class="info1">{{ $row->job_types->name }} . {{ $row->location }}</div>
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($row->created_at)->format('d M, Y') }}</td>
                                            <td>130 Applications</td>
                                            <td>
                                                <div class="job-status text-capitalize">Active</div>
                                            </td>
                                            <td>
                                                <div class="action-dots float-end" wire:ignore>
                                                    <a class="" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item" href="#"  wire:click="switchView('job-details', {{ $row->id }})"> <i class="fa fa-eye" aria-hidden="true"></i> View</a></li>
                                                        <li><a class="dropdown-item" href="#"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></li>
                                                        <li><a class="dropdown-item" href="#"  wire:click="switchView('job-applicants', {{ $row->id }})"> <i class="fa fa-eye" aria-hidden="true"></i> View Applications</a></li>
                                                        <li><a class="dropdown-item" href="#" wire:click="remove_job({{ $row->id }})" wire:confirm="Are you sure you want to delete this job?"><i class="fa fa-trash" aria-hidden="true"></i> Remove</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center py-4">
                                                @if($search)
                                                    No jobs found matching "{{ $search }}"
                                                @else
                                                    No jobs found
                                                @endif
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div>
                                {{ $jobs->links() }}
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</section>
</div>