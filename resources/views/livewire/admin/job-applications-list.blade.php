<div>
    <div class="card border-0 shadow mb-4 p-3">
        <div class="card-body card-form">
            <h3 class="fs-4 mb-1">Job Applications</h3>
            <div class="table-responsive">
                <table class="table ">
                    <thead class="bg-light">
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Applied At</th>
                            <th scope="col">Username</th>
                            <th scope="col">Applicants</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="border-0">
                        @forelse ($applications as $application)
                            <tr class="active">
                                <td>
                                    <div class="job-name fw-500">{{ $application->jobData->title }}</div>
                                    <div class="info1">{{ $application->jobData->job_types->name }} . {{ $application->jobData->location }}</div>
                                </td>
                                <td>{{ \Carbon\Carbon::parse($application->created_at)->format('d M, Y') }}</td>
                                <td>{{$application->userData->name}}</td>
                                <td>{{ $application->jobData->applications->count()}} Applications</td>
                                <td>
                                    <div class="job-status text-capitalize">{{ $application->status }}</div>
                                </td>
                                <td>
                                    <div class="action-dots float-end">
                                        <a href="#" class="" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="{{ route('application.job.view',$application->job_id) }}"> <i class="fa fa-eye" aria-hidden="true"></i> View</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div> 
</div>
