<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class JobTypesModel extends Model
{
    protected $table = "job_types";  
    protected $fillable = [
        'name',
        'status'
    ];
}
