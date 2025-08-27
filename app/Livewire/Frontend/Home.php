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

    public $search = '';

    public function mount()
    {

        $this->categories = CategoryModel::where('status', '1')->get();
        $this->job_types = JobTypesModel::where('status', '1')->get();
    }

    public function render()
    {
          
        $featured_jobs = JobModel::where('is_featured','1')->orderBy('created_at','DESC')->take(6)->get();

        $latest_jobs = JobModel::where('status','1')->orderBy('created_at','DESC')->take(6)->get();

        return view('livewire.frontend.home',['featured_jobs'=>$featured_jobs,'latest_jobs'=>$latest_jobs])
                ->extends('welcome')->section('content');
    }
}
