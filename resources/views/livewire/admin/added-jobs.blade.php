<div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ $postName }}</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this post: <strong>"{{ $postName }}"</strong>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <button type="button" class="btn btn-danger" wire:click="removePost()" data-bs-dismiss="modal">Yes, Delete</button>
            </div>
            </div>
        </div>
    </div>

    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if(session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="card border-0 shadow mb-4 p-3">
        <div class="card-body card-form">
            <h3 class="fs-4 mb-1">Posted Jobs</h3>
            <div class="table-responsive">
                <table class="table ">
                    <thead class="bg-light">
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Job Created</th>
                            <th scope="col">Posted By</th>
                            <th scope="col">Applicants</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="border-0">
                        @forelse ($jobs as $job)
                            <tr class="active">
                                <td>
                                    <div class="job-name fw-500">{{ $job->title }}</div>
                                    <div class="info1">{{ $job->job_types->name }} . {{ $job->location }}</div>
                                </td>
                                <td>05 Jun, 2023</td>
                                <td>{{ $job->users->name }}</td>
                                <td>{{ $job->applications->count() }} Applications</td>
                                <td>
                                    <div class="job-status">
                                        @switch($job->status)
                                            @case(1)
                                                <span class="badge bg-warning" >Pending</span>
                                                @break
                                            @case(2)
                                                <span class="badge bg-success">Approved</span>
                                                @break
                                            @case(3)
                                                <span class="badge bg-danger">Rejected</span>
                                                @break
                                            @default
                                                <span class="badge bg-secondary">Unknown</span>
                                        @endswitch
                                    </div>
                                </td>
                                <td>
                                    <div class="action-dots float-end" wire:ignore>
                                        <a href="#" class="" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="{{ route('view.job', $job->id) }}" wire:navigate> <i class="fa fa-eye" aria-hidden="true"></i> View</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" wire:click="setPostForDeletion({{ $job->id }}, {{ json_encode($job->title) }})" data-bs-target="#exampleModal"><i class="fa fa-trash" aria-hidden="true"></i> Remove</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">No Data Found</td>
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