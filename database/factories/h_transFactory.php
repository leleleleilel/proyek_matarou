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
            'status'=>  $this->faker->randomElement(['400','401','404']),
            'id_user' => $this->faker->randomElement(User::all()->pluck('id')),
            'total'=> $this->faker->numberBetween(1000000,5000000),
            'payment_status'=> $this->faker->randomElement(['capture','settlement']),
            'transaction_id'=> $this->faker->unique()->regexify('[A-Z0-9]{10}'),
            'order_id' => $this->faker->randomNumber(9),
            'payment_type'=> $this->faker->randomElement(['bank_transfer','card_payments','e-wallet']),
            'payment_code'=> null,
            'pdf_url'=> null
        ];
    }
}
