<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $product_name = $this->faker->unique()->words($nb=2, $asText=true);
        $slug = Str::slug($product_name);
        return [
            'name' => $product_name,
            'slug' => $slug,
            'short_description' => $this->faker->text(200),
            'description' => $this->faker->text(500),
            'price' => $this->faker->numberBetween(1000,6000),
            'SKU' => 'DIGI'.$this->faker->unique()->numberBetween(100,500),
            'stock_status' => 'instock',
            // 'quantity' => $this->faker->numberBetween(1,2),
            'image' => 'digital_' . $this->faker->unique()->numberBetween(1,30).'.jpg',
            'category_id' => $this->faker->numberBetween(1,5),
            'size_id' => $this->faker->numberBetween(1,5),
            'brand_id' => $this->faker->numberBetween(1,5),
        ];
    }
}
