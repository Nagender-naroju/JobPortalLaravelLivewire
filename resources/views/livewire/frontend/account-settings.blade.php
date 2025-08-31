<div>
<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Account Settings</li>
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
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fa fa-exclamation-circle me-2"></i>
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                <div class="card border-0 shadow mb-4">
                    <form wire:submit="profile">
                        <div class="card-body p-4">
                            <h3 class="fs-4 mb-1" >My Profile</h3>
                            <div class="mb-4">
                                <label for="" class="mb-2">Name*</label>
                                <input type="text" placeholder="Enter Name" wire:model="name" class="form-control" name="name">
                            </div>
                            @error('name')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                            <div class="mb-4">
                                <label for="" class="mb-2">Email*</label>
                                <input type="text" placeholder="Enter Email" wire:model="email" name="email" class="form-control">
                            </div>
                            @error('email')
                                 <p style="color:red">{{ $message }}</p>
                            @enderror
                            <div class="mb-4">
                                <label for="" class="mb-2">Designation*</label>
                                <input type="text" placeholder="Designation" wire:model="designation" name="designation" class="form-control">
                            </div>
                            @error('designation')
                                 <p style="color:red">{{ $message }}</p>
                            @enderror
                            <div class="mb-4">
                                <label for="" class="mb-2">Mobile*</label>
                                <input type="text" placeholder="Mobile" wire:model="phone_number" name="phone_number" class="form-control">
                            </div>  
                            @error('phone_number')
                                <p style="color:red">{{ $message }}</p>
                            @enderror                      
                        </div>
                        <div class="card-footer  p-4">
                            <input type="submit" class="btn btn-primary" value="Update" wire:target="profile" wire:loading.attr="disabled">
                            <span wire:loading wire:target="profile" class="ms-2">
                                <span class="spinner-border spinner-border-sm" role="status"></span>
                            </span>
                        </div>
                    </form>
                </div>

                @if (session('password_success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('password_success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card border-0 shadow mb-4">
                    <div class="card-body p-4">
                        <h3 class="fs-4 mb-1">Change Password</h3>
                        <form>
                            <div class="mb-4">
                                <label for="" class="mb-2">Old Password*</label>
                                <input type="password" placeholder="Old Password" wire:model="old_password" name="old_password" class="form-control">
                            </div>
                            @error('old_password')
                                <p style="color:red"> {{ $message }}</p>
                            @enderror
                            <div class="mb-4">
                                <label for="" class="mb-2">New Password*</label>
                                <input type="password" placeholder="New Password" wire:model="new_password" name="new_password" class="form-control">
                            </div>
                            @error('new_password')
                                <p style="color:red"> {{ $message }}</p>
                            @enderror
                            <div class="mb-4">
                                <label for="" class="mb-2">Confirm Password*</label>
                                <input type="password" placeholder="Confirm Password" wire:model="confirm_password" name="confirm_password" class="form-control">
                            </div> 
                            @error('confirm_password')
                                <p style="color:red"> {{ $message }}</p>
                            @enderror
                        </form>                    
                    </div>
                    <div class="card-footer  p-4">
                        <button type="button" class="btn btn-primary" wire:click="change_password">Update</button>
                    </div>
                </div>                
            </div>
        </div>
    </div>
</section>
</div>
