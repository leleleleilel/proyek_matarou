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
            'harga'=> $this->faker->numberBetween(150000,1000000),
            'fk_kategori'=> $this->faker->randomElement(kategori::all()->pluck('id')),
            'status'=>'1',
            'nama_file'=>$this->faker->unique()->randomElement(['2FURnO1A.jpg','F0IJN6VL.jpg','tPpImEFN.jpg','RQhqcqzY.jpg','0pXzMdlb.jpg','aJBTR79K.jpg','Enq45cWq.jpg','hDLUTLWz.jpg','JMwL0sfd.jpg','mDKjdqzV.jpg','S7ky1mLm.jpg','scgUD9pt.jpg','VJniixRd.jpg','MG5Y6CMl.jpg','rL52zEZN.jpg','IyBSPGNk.jpg']),
        ];
    }
}
