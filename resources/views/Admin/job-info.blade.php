@extends('welcome')
@section('content')
<section class="section-4 bg-2">    
    <div class="container pt-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class=" rounded-3 p-3">
                    <ol class="breadcrumb mb-0">
                        @if ($currentNav === 'added-jobs')
                            <li class="breadcrumb-item">
                                <a href="{{ url('admin/posted-jobs') }}">
                                    <i class="fa fa-arrow-left" aria-hidden="true"></i> &nbsp;Back to Jobs
                                </a>
                            </li>
                        @elseif ($currentNav === 'job-applications')
                            <li class="breadcrumb-item">
                                <a href="{{ url('admin/job-applications') }}">
                                    <i class="fa fa-arrow-left" aria-hidden="true"></i> &nbsp;Back to Applications
                                </a>
                            </li>
                        @endif
                    </ol>
                </nav>
            </div>
        </div> 
    </div>
    <div class="container job_details_area">
        <div class="row pb-5">
            <div class="col-md-8">
                <div class="card shadow border-0">
                    <div class="job_details_header">
                        <div class="single_jobs white-bg d-flex justify-content-between">
                            <div class="jobs_left d-flex align-items-center">
                                <div class="jobs_conetent">
                                    <a href="#">
                                        <h4>{{ $jobData->title }}</h4>
                                    </a>
                                    <div class="links_locat d-flex align-items-center">
                                        <div class="location">
                                            <p> <i class="fa fa-map-marker"></i> {{ $jobData->location }}</p>
                                        </div>
                                        <div class="location">
                                            <p> <i class="fa fa-clock-o"></i> {{ $jobData->job_types->name }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="jobs_right">
                                <div class="apply_now">
                                    <a class="heart_mark" href="#"> <i class="fa fa-heart-o" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="descript_wrap white-bg">
                        <div class="single_wrap">
                            <h4>Job description</h4>
                            <p>{{$jobData->description}}</p>
                        </div>
                        <div class="single_wrap">
                            <h4>Responsibility</h4>
                            <ul>
                                <li>The applicants should have experience in the following areas.</li>
                                <li>Have sound knowledge of commercial activities.</li>
                                <li>Leadership, analytical, and problem-solving abilities.</li>
                                <li>Should have vast knowledge in IAS/ IFRS, Company Act, Income Tax, VAT.</li>
                            </ul>
                        </div>
                        <div class="single_wrap">
                            <h4>Qualifications</h4>
                            <ul>
                                <li>The applicants should have experience in the following areas.</li>
                                <li>Have sound knowledge of commercial activities.</li>
                                <li>Leadership, analytical, and problem-solving abilities.</li>
                                <li>Should have vast knowledge in IAS/ IFRS, Company Act, Income Tax, VAT.</li>
                            </ul>
                        </div>
                        <div class="single_wrap">
                            <h4>Benefits</h4>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing.</p>
                        </div>
                        <div class="border-bottom"></div>
                        <!-- <div class="pt-3 text-end">
                            <a href="#" class="btn btn-secondary">Save</a>
                            <a href="#" class="btn btn-primary">Apply</a>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow border-0">
                    <div class="job_sumary">
                        <div class="summery_header pb-1 pt-4">
                            <h3>Job Summery</h3>
                        </div>
                        <div class="job_content pt-3">
                            <ul>
                                <li>Published on: <span>{{ \Carbon\Carbon::parse($jobData->created_at)->format('d M, Y') }}</span></li>
                                <li>Vacancy: <span>{{ $jobData->vacancy }}</span></li>
                                <li>Salary: <span>{{ $jobData->salary }}k</span></li>
                                <li>Location: <span>{{ $jobData->location }}</span></li>
                                <li>Job Nature: <span> {{$jobData->job_types->name}}</span></li>
                                @if ($currentNav === 'added-jobs')
                                <input type="hidden" name="post_id" id="post_id" value="{{$jobData->id}}">
                                    <li class="d-flex align-items-center gap-2 mt-2">
                                        <label for="status" class="mb-0"><b>Status:</b></label>
                                        <select name="status" id="status" class="form-control ">
                                            <option value="">Change</option>
                                            <option value="1" {{ $jobData->status==1 ? "selected":""; }}>Pending</option>
                                            <option value="2" {{ $jobData->status==2 ? "selected":""; }}>Approve</option>
                                            <option value="3" {{ $jobData->status==3 ? "selected":""; }}>Rejected</option>
                                        </select>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card shadow border-0 my-4">
                    <div class="job_sumary">
                        <div class="summery_header pb-1 pt-4">
                            <h3>Company Details</h3>
                        </div>
                        <div class="job_content pt-3">
                            <ul>
                                <li>Name: <span>{{ $jobData->company_name }}</span></li>
                                <li>Locaion: <span>{{ $jobData->company_location }}</span></li>
                                <li>Webite: <span><a href="{{ $jobData->company_website }}" target="_blank">{{ $jobData->company_website }}</a></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Confirmation Modal -->
<div class="modal fade" id="confirmStatusModal" tabindex="-1" aria-labelledby="confirmStatusModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirm Status Change</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to change the job status to <strong><span id="selectedStatusText"></span></strong>?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" id="confirmStatusChange" class="btn btn-primary">Yes, Change</button>
      </div>
    </div>
  </div>
</div>


<!-- Toast notification -->
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1080;">
  <div id="statusToast" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
      <div class="toast-body" id="toastMessage">
        Status updated successfully!
      </div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
  </div>
</div>


@endsection
@push('scripts')
<script>
    $(document).ready(function () {
        let selectedStatus = '';
        let postId = $('#post_id').val();

        // Initialize Bootstrap toast
        const toastElement = document.getElementById('statusToast');
        const toast = new bootstrap.Toast(toastElement);

        $('#status').on('change', function () {
            selectedStatus = $(this).val();
            if (!selectedStatus || !postId) return;

            let statusText = {
                1: 'Pending',
                2: 'Approved',
                3: 'Rejected'
            }[selectedStatus];

            $('#selectedStatusText').text(statusText);
            $('#confirmStatusModal').modal('show');
        });

        $('#confirmStatusChange').on('click', function () {
            $.ajax({
                url: "{{ url('admin/change-status') }}",
                method: "POST",
                data: {
                    postId: postId,
                    status: selectedStatus,
                    _token: '{{ csrf_token() }}'
                },
                success: function (res) {
                    $('#confirmStatusModal').modal('hide');

                    // Update toast message dynamically if you want
                    $('#toastMessage').text(res.message || 'Status updated successfully!');

                    // Show toast
                    toast.show();
                },
                error: function (err) {
                    $('#confirmStatusModal').modal('hide');
                    alert('Something went wrong.');
                }
            });
        });
    });
</script>
@endpush
