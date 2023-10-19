<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->paragraph,
            'price' => $this->faker->randomFloat(2, 1, 1000), // Gere um valor decimal com 2 casas decimais entre 1 e 1000.
            'amount' => $this->faker->numberBetween(1, 100),
        ];
    }
}
