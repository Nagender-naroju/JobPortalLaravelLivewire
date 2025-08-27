<?php

namespace App\Models\Frontend;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use App\Models\Frontend\CategoryModel;
use App\Models\Frontend\JobTypesModel;

class JobModel extends Model
{
    use HasFactory;

    protected $table = 'available_jobs';

    protected $fillable = [
         'title',
         'user_id',
         'category_id',
         'job_type_id',
         'vacancy',
         'salary',
         'location',
         'description',
         'benefits',
         'responsibility',
         'qualifications',
         'keywords',
         'company_name',
         'company_location',
         'company_website',
         'experience'
    ];


    public function category()
    {
        return $this->belongsTo(CategoryModel::class, 'category_id');
    }

    public function job_types()
    {
        return $this->belongsTo(JobTypesModel::class,'job_type_id');
    }
}
