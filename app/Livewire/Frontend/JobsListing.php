<?php

namespace App\Livewire\Frontend;

use App\Models\Frontend\CategoryModel;
use App\Models\Frontend\JobModel;
use App\Models\Frontend\JobTypesModel;
use App\Models\Frontend\SavedJobs;
use App\Models\Frontend\JobsApplied;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use App\Mail\AppliedResponse;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class JobsListing extends Component
{

    use WithPagination;

    public $categories;
    public $job_types;

    public $sort = 'latest'; // Default sort

    public $category_id = "";
    public $type_id = [];
    public $keywords = "";
    public $location = "";
    public $experience = "";

    public $current_page = "jobs-listing"; //default page
    public $logged_userId;
    public $single_job;
    public $role;

    public function mount()
    {
        $this->categories = CategoryModel::where('status', '1')->get();
        $this->job_types = JobTypesModel::where('status', '1')->get();

        // check user is logged in or not
        if(Auth::check())
        {
            $this->logged_userId = Auth::user()->id;
            $this->role = Auth::user()->role;
        }
    }

    public function changePage($page, $id)
    {
       if(!empty($id))
       {
         $this->current_page = "job-info";
         $this->single_job = $this->jobWithId($id);
       }
    }

    public function refreshPage()
    {
        $this->type_id = [];
        $this->keywords = '';
        $this->location = '';
        $this->category_id = '';
        $this->experience = "";
        $this->sort = 'latest'; 
        $this->resetPage();
    }

    public function jobWithId($id)
    {
      return JobModel::with(['job_types','category'])->where('id',$id)->first();
    }

    public function saveJob($id)
    {
        // frist check user is logged in or not
       
        if(Auth::check()==false){
            session()->flash('error','Please login to save job');
        }else{
            // First check with Job Id exist
            $query = SavedJobs::where(['job_id'=>$id,'user_id'=>Auth::user()->id])->first();
                
            if(empty($query)){
                SavedJobs::create([
                    'job_id'=>$id,
                    'user_id'=>Auth::user()->id
                ]);
                session()->flash('success','Job saved successfully');
            }else{
                session()->flash('error','Job already saved');
            }
        }  
    }

    public function applyJob($job_id)
    {
        if(!Auth::check())
        {
            session()->flash('error','Please login to apply job');
        }else{
            $query = JobModel::where('id', $job_id)->first();
            if(!empty($query))
            {
                // insert to applied job table
                $is_exist = JobsApplied::where(['job_id'=>$job_id,'user_id'=>$this->logged_userId])->first();
                if(!empty($is_exist)){
                    session()->flash('error','Job Already Applied');
                }else{
                    $res = JobsApplied::create([
                        'job_id'=>$job_id,
                        'user_id'=>Auth::user()->id,
                        'status'=>'pending'
                    ]);

                    $user = User::where('id',$res->user_id)->first();

                    $employer = User::where('id',$query->user_id)->first();
                    Mail::to($user->email)->queue(new AppliedResponse($user,$query));
                    Mail::to($employer->email)->queue(new AppliedResponse($user,$query));

                    if(!empty($res)){
                        session()->flash('success','Job Applied Successfully'); 
                    }else{
                        session()->flash('error','Failed To Apply The Job');
                    }
                     
                }
            }else{
                 session()->flash('error','Job not found');
            }
        }
    }


    public function updatingSort()
    {
        $this->resetPage(); // Reset to page 1 when sort changes
    }

    public function render()
    {
        $query = JobModel::with('job_types');

        // Apply sorting
        if ($this->sort === 'latest') {
            $query->orderBy('id', 'desc');
        } elseif ($this->sort === 'oldest') {
            $query->orderBy('id', 'asc');
        }

        // Apply Category filter
        if($this->category_id != "")
        {
            $query->where('category_id',$this->category_id);
        }

         // Apply job type filter
        if (!empty($this->type_id)) {
            $query->whereIn('job_type_id', $this->type_id);
        }

        if(!empty($this->keywords))
        {
            $query->where('keywords','like',"%".$this->keywords."%");
        }

        // Apply location filter
        if(!empty($this->location))
        {
            $query->where('location', 'like',"%".$this->location."%");
        }

        if(!empty($this->experience))
        {
            if($this->experience == "10+ Years"){
                $query->where('experience', '>=', 10);
            }else{
                $query->where('experience',$this->experience);
            }
            
        }

        $jobs = $query->paginate(9); // Adjust per-page value as needed
       return view('livewire.frontend.'.$this->current_page,['jobs'=>$jobs])->extends('welcome')->section('content');
    }
}
