<?php

namespace Database\Factories;

use App\Models\kode_promo;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\h_trans>
 */
class h_transFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'tanggal_trans' => $this->faker->dateTimeBetween('-1 week', '+1 week'),
            'fk_kode_promo' => $this->faker->randomElement(kode_promo::all()->pluck('id')),
            'status'=> '1',
            'id_user' => $this->faker->randomElement(User::all()->pluck('id'))
        ];
    }
}
