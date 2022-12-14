<?php

namespace Database\Factories;

use App\Models\baju;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dfoto>
 */
class DfotoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_baju' => $this->faker->randomElement(baju::all()->pluck('id')),
            'nama_file' => $this->faker->randomElement(['EsUGOr3E.jpg','hjrDyNo9.jpg','JD5NAk5E.jpg']),
            'status'=>'1'
        ];
    }
}
