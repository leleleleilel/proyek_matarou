<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\kode_promo>
 */
class kode_promoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->unique()->name(),
            'kode'=>$this->faker->unique()->words(1,true),
            'besar_potongan'=>$this->faker->numberBetween(1,200000),
            'jenis_potongan'=> $this->faker->randomElement(['Diskon','Potongan']),
            'valid_from' => $this->faker->dateTimeBetween('-3 week', '-1 week'),
            'valid_until' => $this->faker->dateTimeBetween('+2 week', '+4 week'),
            'minimum_total'=> $this->faker->numberBetween(1000,500000),
            'status' => '1'
        ];
    }
}
