<?php

namespace App\Models\Frontend;

use App\Models\Frontend\JobModel;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use App\Observers\JobApplications;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;

#[ObservedBy([JobApplications::class])]

class JobsApplied extends Model
{
   protected $table = "jobs_applieds";

   public $fillable = [
        'user_id',
        'job_id',
        'status'
   ];

   public function userData()
   {
      return $this->belongsTo(User::class,'user_id','id');
   }

   public function jobData()
   {
      return $this->belongsTo(JobModel::class,'job_id','id');
   }
}
