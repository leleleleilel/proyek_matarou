<?php

namespace Database\Factories;

use App\Models\d_baju;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\cart>
 */
class cartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_dbaju' => $this->faker->randomElement(d_baju::all()->pluck('id')),
            'quantity' => $this->faker->numberBetween(1,20),
            'id_user'=>'1'
        ];
    }
}
