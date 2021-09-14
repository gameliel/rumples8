<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BrandFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Brand::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $brand_name = $this->faker->unique()->words($nb=2, $asText=true);
        $slug = Str::slug($brand_name);
        return [
            'name' => $brand_name,
            'slug' => $slug,
        ];
    }
}
