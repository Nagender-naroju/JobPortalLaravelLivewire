<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    protected $table = "categories";  
 
    protected $fillable = [
        'category_name',
        'status',
    ];
}
