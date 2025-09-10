<?php

namespace App\Models\Frontend;

use App\Models\Frontend\JobModel;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    protected $table = "categories";  
 
    protected $fillable = [
        'category_name',
        'status',
    ];

    public function available_position()
    {
        return $this->hasMany(JobModel::class, 'category_id','id');
    }
}
