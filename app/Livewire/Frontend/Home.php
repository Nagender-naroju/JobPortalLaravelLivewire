<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use App\Models\Frontend\CategoryModel;
use App\Models\Frontend\JobTypesModel;
use App\Models\Frontend\JobModel;

class Home extends Component
{
    public $name;
    public $categories = [];
    public $single_job;
    public $current_page='home';
    public $search = '';
    public $logged_userId;
    public $role;

    public function mount()
    {
      if(Auth::check())
      {
        $this->logged_userId = Auth::user()->id;
        $this->role = Auth::user()->role;
      }
        $this->categories = CategoryModel::where('status', '1')->get();
        $this->job_types = JobTypesModel::where('status', '1')->get();
    }

    public function changePage($page, $id)
    {
       if(!empty($id))
       {
         $this->current_page = "job-info";
         $this->single_job = $this->jobWithId($id);
       }
    }


    public function jobWithId($id)
    {
      return JobModel::with(['job_types','category'])->where('id',$id)->first();
    }


    public function render()
    {
          
        $featured_jobs = JobModel::with(['job_types'])->where('is_featured','1')->orderBy('created_at','DESC')->take(6)->get();

        $latest_jobs = JobModel::with(['job_types'])->where('status','1')->orderBy('created_at','DESC')->take(6)->get();

        return view('livewire.frontend.'.$this->current_page,['featured_jobs'=>$featured_jobs,'latest_jobs'=>$latest_jobs])
                ->extends('welcome')->section('content');
    }
}
