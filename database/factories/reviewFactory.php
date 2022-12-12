<?php

namespace Database\Factories;

use App\Models\baju;
use App\Models\h_trans;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\review>
 */
class reviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'rate' => $this->faker->numberBetween(1,5),
            'deskripsi_review'=>$this->faker->unique()->paragraph(),
            'fk_htrans'=>$this->faker->randomElement(h_trans::all()->pluck('id')),
            'fk_baju'=>$this->faker->randomElement(baju::all()->pluck('id')),
            'status'=>'1'
        ];
    }
}
