<div>
<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Post a Job</li>
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
                    <x-account-nav/>
                </div>
            </div>
            <div class="col-lg-9">
                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card border-0 shadow mb-4 ">
                    <div class="card-body card-form p-4">
                        <h3 class="fs-4 mb-1">Job Details</h3>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="" class="mb-2">Title<span class="req">*</span></label>
                                <input type="text" placeholder="Job Title" wire:model="title" name="title" class="form-control">
                            </div>
                            @error('title')
                                <p style="color:red">{{ $message }}</p>
                            @enderror

                            <div class="col-md-6  mb-4">
                                <label for="" class="mb-2">Category<span class="req">*</span></label>
                                <select name="category_id" wire:model="category_id" class="form-select">
                                    <option value="">Select a Category</option>
                                    @foreach ($categories as $row)
                                        <option value="{{ $row->id }}">{{ $row->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('category_id')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="" class="mb-2">Job Nature<span class="req">*</span></label>
                                <select wire:model="job_type_id" name="job_type_id" class="form-select">
                                    <option value="">Choose Job Type</option>
                                    @foreach ($job_types as $row)
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('job_type_id')
                                <p style="color:red">{{ $message }}</p>
                            @enderror

                            <div class="col-md-6  mb-4">
                                <label for="" class="mb-2">Vacancy<span class="req">*</span></label>
                                <input type="number" min="1" placeholder="Vacancy" wire:model="vacancy" name="vacancy" class="form-control">
                            </div>
                            @error('vacancy')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="mb-4 col-md-6">
                                <label for="" class="mb-2">Salary</label>
                                <input type="text" placeholder="Salary" wire:model="salary" name="salary" class="form-control">
                            </div>
                            @error('salary')
                                <p style="color:red">{{ $message }}</p>
                            @enderror

                            <div class="mb-4 col-md-6">
                                <label for="" class="mb-2">Location<span class="req">*</span></label>
                                <input type="text" placeholder="Job Location" wire:model="job_location" name="job_location" class="form-control">
                            </div>
                            @error('job_location')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="" class="mb-2">Description<span class="req">*</span></label>
                            <textarea class="form-control" name="description" wire:model="description" cols="5" rows="5" placeholder="Description"></textarea>
                        </div>
                        @error('description')
                            <p style="color:red">{{ $message }}</p>
                        @enderror

                        <div class="mb-4">
                            <label for="" class="mb-2">Benefits</label>
                            <textarea class="form-control" name="benefits" wire:model="benefits" cols="5" rows="5" placeholder="Benefits"></textarea>
                        </div>
                        @error('benefits')
                            <p style="color:red">{{ $message }}</p>
                        @enderror


                        <div class="mb-4">
                            <label for="" class="mb-2">Responsibility</label>
                            <textarea class="form-control" name="responsibility" wire:model="responsibility" cols="5" rows="5" placeholder="Responsibility"></textarea>
                        </div>
                        @error('responsibility')
                            <p style="color:red">{{ $message }}</p>
                        @enderror

                        <div class="mb-4">
                            <label for="" class="mb-2">Qualifications</label>
                            <textarea class="form-control" name="qualifications" wire:model="qualifications" cols="5" rows="5" placeholder="Qualifications"></textarea>
                        </div>
                        @error('qualifications')
                            <p style="color:red">{{ $message }}</p>
                        @enderror

                        <div class="mb-4">
                            <label for="" class="mb-2">Experience</label>
                            <input type="text" placeholder="Experience"  name="experience" wire:model="experience" class="form-control">
                         </div>
                        @error('experience')
                            <p style="color:red">{{ $message }}</p>
                        @enderror
                        

                        <div class="mb-4">
                            <label for="" class="mb-2">Keywords<span class="req">*</span></label>
                            <input type="text" placeholder="keywords" wire:model="keywords" name="keywords" class="form-control">
                        </div>
                        @error('keywords')
                            <p style="color:red">{{ $message }}</p>
                        @enderror

                        <h3 class="fs-4 mb-1 mt-5 border-top pt-5">Company Details</h3>

                        <div class="row">
                            <div class="mb-4 col-md-6">
                                <label for="" class="mb-2">Name<span class="req">*</span></label>
                                <input type="text" placeholder="Company Name" wire:model="company_name" name="company_name" class="form-control">
                            </div>
                            @error('company_name')
                                <p style="color:red">{{ $message }}</p>
                            @enderror

                            <div class="mb-4 col-md-6">
                                <label for="" class="mb-2">Location</label>
                                <input type="text" placeholder="Company Location" wire:model="company_location" name="company_location" class="form-control">
                            </div>
                            @error('company_location')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="" class="mb-2">Website</label>
                            <input type="text" placeholder="Website" wire:model="website" name="website" class="form-control">
                        </div>
                        @error('website')
                            <p style="color:red">{{ $message }}</p>
                        @enderror
                    </div> 
                    <div class="card-footer  p-4">
                        <button type="button" wire:click="save_job" class="btn btn-primary">Save Job</button>
                    </div> 
                </form>
            </div>
            
        </div>
    </div>
</section>
</div>
