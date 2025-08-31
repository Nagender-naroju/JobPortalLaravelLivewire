<div>
<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="#" wire:click="backToJobList()">My Jobs</a></li>
                        <li class="breadcrumb-item active">Job Applicants</li>
                    </ol>
                </nav>
            </div>
        </div>
        
        <div class="container pt-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class=" rounded-3 p-3" style="float: inline-end;">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="#" wire:click="backToJobList()">
                                    <i class="fa fa-arrow-left" aria-hidden="true"></i> &nbsp;Back to Jobs
                                </a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div> 
        </div>
      
        <!-- Confirmation Modal -->
        <div class="modal fade" id="confirmRemoveModal" tabindex="-1" aria-labelledby="confirmRemoveModalLabel" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmRemoveModalLabel">Confirm Removal</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to remove this application?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger" wire:click="removeApplication">
                            <span wire:loading.remove wire:target="removeApplication">Yes, Remove</span>
                            <span wire:loading wire:target="removeApplication">
                                <span class="spinner-border spinner-border-sm me-2"></span>Removing...
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3">
                <div class="card border-0 shadow mb-4 p-3">
                    <div class="s-body text-center mt-3">
                        <img src="assets/images/avatar7.png" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                        <h5 class="mt-3 pb-0">{{ $name }}</h5>
                        <p class="text-muted mb-1 fs-6">{{ $designation }}</p>
                        <div class="d-flex justify-content-center mb-2">
                            <button data-bs-toggle="modal" data-bs-target="#exampleModal" type="button" class="btn btn-primary">Change Profile Picture</button>
                        </div>
                    </div>
                </div>
                <div class="card account-nav border-0 shadow mb-4 mb-lg-0">
                   <x-account-nav/>
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
                
                {{-- Job Details Card --}}
                @if($selectedJob)
                    <div class="card border-0 shadow mb-4 p-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div>
                                    <h4 class="mb-1">{{ $selectedJob->title }}</h4>
                                    <p class="text-muted mb-0">
                                        <i class="fa fa-map-marker-alt me-1"></i> {{ $selectedJob->location }}
                                        <span class="ms-3">
                                            <i class="fa fa-briefcase me-1"></i> {{ $selectedJob->job_types->name ?? 'N/A' }}
                                        </span>
                                    </p>
                                </div>
                                <span class="badge bg-success">{{ count($applicants) }} Applicants</span>
                            </div>
                        </div>
                    </div>
                @endif
                
                {{-- Applicants Table --}}
                <div class="card border-0 shadow mb-4 p-3">
                    <div class="card-body card-form">
                        <h3 class="fs-4 mb-3">Job Applicants</h3>
                        
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="bg-light">
                                    <tr>
                                        <th scope="col">Applied At</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="border-0">
                                    @forelse ($applicants as $row)
                                        <tr class="active" wire:key="applicant-{{ $row->id }}">
                                            <td>{{ \Carbon\Carbon::parse($row->created_at)->format('d M, Y') }}</td>
                                            <td>
                                                <div class="fw-500">{{ $row->userData->name ?? 'N/A' }}</div>
                                            </td>
                                            <td>{{ $row->userData->email ?? 'N/A' }}</td>
                                            <td>{{ $row->userData->phone_number ?? 'N/A' }}</td>
                                            <td>
                                                <span class="badge bg-{{ $row->status == 'pending' ? 'warning' : ($row->status == 'approved' ? 'success' : 'danger') }}">
                                                    {{ ucfirst($row->status) }}
                                                </span>
                                            </td>
                                            <td>
                                                <div class="action-dots float-end" wire:ignore>
                                                    <a class="" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li>
                                                            <a class="dropdown-item" href="#"
                                                               wire:click="setApplicationForRemoval({{ $row->id }})"
                                                               data-bs-toggle="modal" 
                                                               data-bs-target="#confirmRemoveModal">
                                                                <i class="fa fa-trash" aria-hidden="true"></i> Remove Application
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="#"
                                                               wire:click="updateApplicationStatus({{ $row->id }}, 'approved')">
                                                                <i class="fa fa-check" aria-hidden="true"></i> Approve
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="#"
                                                               wire:click="updateApplicationStatus({{ $row->id }}, 'rejected')">
                                                                <i class="fa fa-times" aria-hidden="true"></i> Reject
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center py-4">
                                                <div class="text-muted">
                                                    <i class="fa fa-users fa-2x mb-3"></i>
                                                    <p>No applications received yet for this job.</p>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        
                        {{-- Pagination if needed --}}
                        @if(count($applicants) > 10)
                            <div class="mt-3">
                                {{-- Add pagination for applicants if needed --}}
                            </div>
                        @endif
                    </div>
                </div> 
            </div>
        </div>
    </div>
</section>
</div>