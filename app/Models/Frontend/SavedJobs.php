<?php

namespace App\Models\Frontend;

use App\Models\Frontend\JobModel;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class SavedJobs extends Model
{
   protected $table = "saved_jobs";

   public $fillable = [
        'user_id',
        'job_id'
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
