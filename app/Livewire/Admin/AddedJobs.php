<?php

namespace App\Livewire\Admin;

use App\Models\Frontend\JobModel;
use Livewire\Component;
use Livewire\WithPagination;

class AddedJobs extends Component
{
    use WithPagination;

    public $postId;
    public $postName;
    public $defaultView='added-jobs';

    public function placeholder()
    {
        return <<<'HTML'
            <div class="card border-0 shadow mb-4 mt-4">
                <div class="card-header">Posted Jobs</div>
                <div class="card-body p-4">
                    <table class="table">
                        <thead class="bg-light">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Created</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody class="border-0">
                            <tr class="active">
                                <th>
                                    <div class="placeholder-glow">
                                        <span class="placeholder" style="width: 20px;"></span>
                                    </div>
                                </th>
                                <td>
                                    <div class="placeholder-glow">
                                        <span class="placeholder col-8"></span>
                                    </div>
                                </td>
                                <td>
                                    <div class="placeholder-glow">
                                        <span class="placeholder col-10"></span>
                                    </div>
                                </td>
                                <td>
                                    <div class="placeholder-glow">
                                        <span class="placeholder col-6"></span>
                                    </div>
                                </td>
                                <td>
                                    <div class="placeholder-glow">
                                        <span class="placeholder col-7"></span>
                                    </div>
                                </td>
                                <td>
                                    <div class="placeholder-glow">
                                        <span class="placeholder" style="width: 30px; height: 30px; border-radius: 50%;"></span>
                                    </div>
                                </td>
                            </tr>
                            <tr class="active">
                                <th>
                                    <div class="placeholder-glow">
                                        <span class="placeholder" style="width: 20px;"></span>
                                    </div>
                                </th>
                                <td>
                                    <div class="placeholder-glow">
                                        <span class="placeholder col-9"></span>
                                    </div>
                                </td>
                                <td>
                                    <div class="placeholder-glow">
                                        <span class="placeholder col-11"></span>
                                    </div>
                                </td>
                                <td>
                                    <div class="placeholder-glow">
                                        <span class="placeholder col-7"></span>
                                    </div>
                                </td>
                                <td>
                                    <div class="placeholder-glow">
                                        <span class="placeholder col-6"></span>
                                    </div>
                                </td>
                                <td>
                                    <div class="placeholder-glow">
                                        <span class="placeholder" style="width: 30px; height: 30px; border-radius: 50%;"></span>
                                    </div>
                                </td>
                            </tr>
                            <tr class="active">
                                <th>
                                    <div class="placeholder-glow">
                                        <span class="placeholder" style="width: 20px;"></span>
                                    </div>
                                </th>
                                <td>
                                    <div class="placeholder-glow">
                                        <span class="placeholder col-7"></span>
                                    </div>
                                </td>
                                <td>
                                    <div class="placeholder-glow">
                                        <span class="placeholder col-9"></span>
                                    </div>
                                </td>
                                <td>
                                    <div class="placeholder-glow">
                                        <span class="placeholder col-8"></span>
                                    </div>
                                </td>
                                <td>
                                    <div class="placeholder-glow">
                                        <span class="placeholder col-7"></span>
                                    </div>
                                </td>
                                <td>
                                    <div class="placeholder-glow">
                                        <span class="placeholder" style="width: 30px; height: 30px; border-radius: 50%;"></span>
                                    </div>
                                </td>
                            </tr>
                            <tr class="active">
                                <th>
                                    <div class="placeholder-glow">
                                        <span class="placeholder" style="width: 20px;"></span>
                                    </div>
                                </th>
                                <td>
                                    <div class="placeholder-glow">
                                        <span class="placeholder col-7"></span>
                                    </div>
                                </td>
                                <td>
                                    <div class="placeholder-glow">
                                        <span class="placeholder col-9"></span>
                                    </div>
                                </td>
                                <td>
                                    <div class="placeholder-glow">
                                        <span class="placeholder col-8"></span>
                                    </div>
                                </td>
                                <td>
                                    <div class="placeholder-glow">
                                        <span class="placeholder col-7"></span>
                                    </div>
                                </td>
                                <td>
                                    <div class="placeholder-glow">
                                        <span class="placeholder" style="width: 30px; height: 30px; border-radius: 50%;"></span>
                                    </div>
                                </td>
                            </tr>
                            <tr class="active">
                                <th>
                                    <div class="placeholder-glow">
                                        <span class="placeholder" style="width: 20px;"></span>
                                    </div>
                                </th>
                                <td>
                                    <div class="placeholder-glow">
                                        <span class="placeholder col-7"></span>
                                    </div>
                                </td>
                                <td>
                                    <div class="placeholder-glow">
                                        <span class="placeholder col-9"></span>
                                    </div>
                                </td>
                                <td>
                                    <div class="placeholder-glow">
                                        <span class="placeholder col-8"></span>
                                    </div>
                                </td>
                                <td>
                                    <div class="placeholder-glow">
                                        <span class="placeholder col-7"></span>
                                    </div>
                                </td>
                                <td>
                                    <div class="placeholder-glow">
                                        <span class="placeholder" style="width: 30px; height: 30px; border-radius: 50%;"></span>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        HTML;
    }

    public function boot()
    {
        if(isset($this->postId))
        {
            $checkJob = JobModel::where('id',$this->postId)->first();
            if($checkJob) {
                $this->postName = $checkJob->title;
            }
        }
    }
    
    public function setPostForDeletion($postId, $postName)
    {
        $this->postId = $postId;
        $this->postName = $postName;
    }

    public function removePost()
    {
        try{
            $checkJob = JobModel::where('id',$this->postId)->first();
            
            if(!$checkJob){
                session()->flash('error', "Post not found");
            }else{
                $checkJob->delete();
                session()->flash('success', "Post Removed Successfully");
                // Reset the values after deletion
                $this->reset(['postId', 'postName']);
            }
        }catch(Exception $e){
            session()->flash('error', $e->getMessage());
        }
    }

    public function render()
    {
        $jobs = JobModel::with(['applications','job_types','users'])->orderBy('id','DESC')->paginate(5);
        return view('livewire.admin.'.$this->defaultView,['jobs'=>$jobs]);
    }
}