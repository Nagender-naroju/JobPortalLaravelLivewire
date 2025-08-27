<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class JobsApplied extends Model
{
   protected $table = "jobs_applieds";

   public $fillable = [
        'user_id',
        'job_id',
        'status'
   ];
}
