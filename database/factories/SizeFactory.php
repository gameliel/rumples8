<?php

namespace Database\Factories;

use App\Models\Size;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SizeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Size::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $size_name = $this->faker->unique()->words($nb=2, $asText=true);
        $slug = Str::slug($size_name);
        return [
            'name' => $size_name,
            'slug' => $slug,
        ];
    }
}
