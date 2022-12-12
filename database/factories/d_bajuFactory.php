<?php

namespace Database\Factories;

use App\Models\baju;
use App\Models\size;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\d_baju>
 */
class d_bajuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'fk_baju' => $this->faker->randomElement(baju::all()->pluck('id')),
            'stok' => $this->faker->numberBetween(1,20),
            'fk_size'=> $this->faker->randomElement(size::all()->pluck('id')),
            'status'=>'1'
        ];
    }
}
