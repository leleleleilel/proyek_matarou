<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\size>
 */
class sizeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'kode'=>$this->faker->unique()->randomElement(['XXS','XS','S','M','L','XL','XXL']),
            'nama' => $this->faker->unique()->randomElement(['Extra Extra Small','Extra Small','Small','Medium','Large', 'Extra Large','Extra Extra Large']),
            'status'=>'1'
        ];
    }
}
