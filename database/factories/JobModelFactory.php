<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Frontend\JobModel;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class JobModelFactory extends Factory
{

    protected $model = JobModel::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=> $this->faker->jobTitle(),
            'user_id'=>rand(1,2),
            'job_type_id'=> rand(1,4),
            'salary'=>rand(5000,10000),
            'category_id'=>rand(1,4),
            'vacancy'=>rand(1,5),
            'location'=>fake()->city,
            'description'=>fake()->text,
            'experience'=>'5 Years',
            'company_name'=>fake()->name,
            'company_location'=>fake()->city,
            'company_website'=>$this->faker->url()
         ];
    }
}
