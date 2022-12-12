<?php

namespace Database\Factories;

use App\Models\baju;
use App\Models\kategori;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\baju>
 */
class bajuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'kode' => $this->faker->unique()->words(1,true),
            'nama' => $this->faker->unique()->name(),
            'deskripsi' => $this->faker->words(15,true),
            'harga'=> $this->faker->numberBetween(1000,100000000),
            'fk_kategori'=> $this->faker->randomElement(kategori::all()->pluck('id')),
            'status'=>'1'
        ];
    }
}
