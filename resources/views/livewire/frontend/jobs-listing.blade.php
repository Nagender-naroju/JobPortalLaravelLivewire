<div>
<section class="section-3 py-5 bg-2 ">
    <div class="container">     
        <div class="row">
            <div class="col-6 col-md-10 ">
                <h2>Find Jobs</h2>  
            </div>
            <div class="col-6 col-md-2">
                <div class="align-end">
                    <select wire:model.live="sort" class="form-control">
                        <option value="latest">Latest</option>
                        <option value="oldest">Oldest</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row pt-5">
            <div class="col-md-4 col-lg-3 sidebar mb-4">
                <div class="card border-0 shadow p-4">
                    <div class="mb-4">
                        <h2>Keywords</h2>
                        <input type="text" name="keyword" wire:model.live="keywords" placeholder="Keywords" class="form-control">
                    </div>

                    <div class="mb-4">
                        <h2>Location</h2>
                        <input type="text" wire:model.live="location" placeholder="Location" class="form-control">
                    </div>

                    <div class="mb-4">
                        <h2>Category</h2>
                        <select name="category_id" wire:model.live="category_id" class="form-control">
                            <option value="">Select a Category</option>
                            @foreach ($categories as $row)
                                <option value="{{ $row->id }}">{{ $row->category_name }}</option>
                            @endforeach
                        </select>
                    </div>                   

                    <div class="mb-4">
                        <h2>Job Type</h2>
                        @forelse ($job_types as $type)
                            <div class="form-check mb-2"> 
                                <input class="form-check-input " name="job_type" wire:model.live="type_id" type="checkbox" value="{{$type->id}}" id="job_type_{{$type->id}}">    
                                <label class="form-check-label " for="">{{$type->name}}</label>
                            </div>
                        @empty
                            <div>No Data found</div>
                        @endforelse
                    </div>

                    <div class="mb-4">
                        <h2>Experience</h2>
                        <select name="experience" wire:model.live="experience" class="form-control">
                            <option value="">Select Experience</option>
                            <option value="1 Year">1 Year</option>
                            <option value="2 Years">2 Years</option>
                            <option value="3 Years">3 Years</option>
                            <option value="4 Years">4 Years</option>
                            <option value="5 Years">5 Years</option>
                            <option value="6 Years">6 Years</option>
                            <option value="7 Years">7 Years</option>
                            <option value="8 Years">8 Years</option>
                            <option value="9 Years">9 Years</option>
                            <option value="10 Years">10 Years</option>
                            <option value="10+ Years">10+ Years</option>
                        </select>
                    </div>            
                    <!-- Clear Filters Button -->
                    <div class="mb-4">
                        <button class="btn btn-danger w-100" wire:click="refreshPage()">Clear All</button>
                    </div>          
                </div>
            </div>
            <div class="col-md-8 col-lg-9 ">
                <div class="job_listing_area">                    
                    <div class="job_lists">
                        <div class="row">
                            @forelse ($jobs as $row)
                            <div class="col-md-4">
                                <div class="card border-0 p-3 shadow mb-4">
                                    <div class="card-body">
                                        <h3 class="border-0 fs-5 pb-2 mb-0">{{ $row->title }}</h3>
                                        <p>{{ substr($row->description, 0, 100) }}...</p>
                                        <div class="bg-light p-3 border">
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-map-marker"></i></span>
                                                <span class="ps-1">{{ $row->location }}</span>
                                            </p>
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-clock-o"></i></span>
                                                <span class="ps-1">{{ $row->job_types->name }}</span>
                                            </p>
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-usd"></i></span>
                                                <span class="ps-1">{{ $row->salary }} PA</span>
                                            </p>
                                        </div>

                                        <div class="d-grid mt-3">
                                            <a wire:click="changePage('job-info',{{$row->id}})" class="btn btn-primary btn-lg">Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                            @empty
                                <div class="col-md-12">No Jobs Found</div>
                            @endforelse          
                        </div>
                        {{ $jobs->links() }}
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>
</div>
