<div>
    <div class="card border-0 shadow mb-4 mt-4">
        <div class="card-header">
            Users Management
            <div class="float-end">
                <form method="post">
                    <div class="position-relative">
                        <input type="text" 
                            name="search" 
                            placeholder="Search.." 
                            class="form-control pe-5" 
                            wire:model.live="search">
                        @if(!empty($search))
                            <button type="button" 
                                    class="btn btn-link position-absolute top-50 end-0 translate-middle-y me-2 p-1"
                                    wire:click="clearSearch"
                                    style="z-index: 5; border: none;">
                                <i class="fa fa-times text-muted"></i>
                            </button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
        <div class="card-body p-4">
            <div class="table-responsive">
                <table class="table">
                    <thead class="bg-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Created</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="border-0">
                        @forelse($users as $user)
                            <tr class="active">
                                <th>{{ $user->id }}</th>
                                <td>
                                    <div class="job-name fw-500">{{ $user->name }}</div>
                                </td>
                                <td>
                                    <div class="job-name fw-500">{{ $user->email }}</div>
                                </td>
                                <td>
                                    <div class="job-name fw-500">
                                        @if($user->role == 1)
                                            Employer
                                        @else
                                            Job Seeker
                                        @endif
                                    </div>
                                </td>
                                <td>{{ \Carbon\Carbon::parse($user->created_at)->format('d M, Y') }}</td>
                                <td>
                                    <div class="action-dots">
                                        <button href="#" class="btn" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="#"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4">
                                    <div class="empty-state">
                                        <i class="fa fa-users fa-3x text-muted mb-3"></i>
                                        <h5 class="text-muted">No users found</h5>
                                        <p class="text-muted">There are currently no users to display.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>