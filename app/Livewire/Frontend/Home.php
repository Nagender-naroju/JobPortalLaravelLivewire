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

    public function placeholder()
    {
        return <<<'HTML'
        <div class="card" aria-hidden="true">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title placeholder-glow">
                <span class="placeholder col-6"></span>
                </h5>
                <p class="card-text placeholder-glow">
                <span class="placeholder col-7"></span>
                <span class="placeholder col-4"></span>
                <span class="placeholder col-4"></span>
                <span class="placeholder col-6"></span>
                <span class="placeholder col-8"></span>
                </p>
                <a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-6"></a>
            </div>
        </div>
        HTML;
    }

    public function render()
    {
          
        $featured_jobs = JobModel::with(['job_types'])->where('is_featured','1')->orderBy('created_at','DESC')->take(6)->get();

        $latest_jobs = JobModel::with(['job_types'])->where('status','1')->orderBy('created_at','DESC')->take(6)->get();

        return view('livewire.frontend.home',['featured_jobs'=>$featured_jobs,'latest_jobs'=>$latest_jobs])
                ->extends('welcome')->section('content');
    }
}
