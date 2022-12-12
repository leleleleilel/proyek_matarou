<?php

namespace Database\Factories;

use App\Models\d_baju;
use App\Models\h_trans;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\d_trans>
 */
class d_transFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'fk_dbaju' => $this->faker->randomElement(d_baju::all()->pluck('id')),
            'qty' => $this->faker->numberBetween(1,4),
            'harga'=> $this->faker->numberBetween(1000,100000),
            'subtotal'=> $this->faker->numberBetween(1000,10000000),
            'fk_htrans' => $this->faker->randomElement(h_trans::all()->pluck('id')),
        ];
    }
}
