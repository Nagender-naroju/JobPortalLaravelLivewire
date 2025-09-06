<?php

namespace App\Livewire\Frontend;

use App\Events\JobPostAdded;
use App\Models\Frontend\CategoryModel;

use App\Models\Frontend\JobModel;
use App\Models\Frontend\JobTypesModel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PostJob extends Component
{
    public $name;
    public $designation;
    public $categories = [];
    public $job_types = [];

    public $title;
    public $category_id;
    public $job_type_id;
    public $vacancy;
    public $salary;
    public $job_location;
    public $description;
    public $benefits;
    public $responsibility;
    public $qualifications;
    public $keywords;
    public $experience;
    public $company_name;
    public $company_location;
    public $website;

    public $jobs = [];


    public function mount()
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
        $this->designation = Auth::user()->designation;

        // Categories
        $this->categories = CategoryModel::where('status','1')->get();

        // Job_types
        $this->job_types = JobTypesModel::where('status','1')->get();

        // Jobs List
        $this->jobs = JobModel::with('category', 'job_types')->where('status','1')->get();

    }

     public function save_job()
     {
        $this->validate([
         'title'=>"required|string",
         'category_id'=>"required|numeric",
         'job_type_id'=>"required|numeric",
         'vacancy'=>"required|numeric",
         'job_location'=>"required|string",
         'salary'=>"required|numeric",
         'description'=>"required|string",
         'benefits'=>"string",
         'responsibility'=>"string",
         'qualifications'=>"string",
         'keywords'=>"required|string",
         'company_name'=>"required|string",
         'company_location'=>"required|string",
         'website'=>"required|string",
         'experience'=>"required|string"
        ]);

        $job = JobModel::create([
            'title'=>$this->title,
            'user_id'=>Auth::user()->id,
            'category_id'=>$this->category_id,
            'job_type_id'=>$this->job_type_id,
            'vacancy'=>$this->vacancy,
            'location'=>$this->job_location,
            'salary'=>$this->salary,
            'description'=>$this->description,
            'benefits'=>$this->benefits,
            'responsibility'=>$this->responsibility,
            'qualifications'=>$this->qualifications,
            'keywords'=>$this->keywords,
            'company_name'=>$this->company_name,
            'company_location'=>$this->company_location,
            'company_website'=>$this->website,
            'experience'=>$this->experience
        ]);

        JobPostAdded::dispatch($job);

        session()->flash('status','Job Posted Successfully');
        
        $this->reset();

     } 

    public function render()
    {
        return view('livewire.frontend.post-job')->extends('welcome')->section('content');
    }
}
