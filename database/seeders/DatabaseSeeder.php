<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\d_baju;
use App\Models\kategori;
use App\Models\kode_promo;
use App\Models\size;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([UserSeeder::class]);
        $this->call([kategoriSeeder::class]);
        $this->call([kode_promoSeeder::class]);
        $this->call([sizeSeeder::class]);
        $this->call([bajuSeeder::class]);
        $this->call([d_bajuSeeder::class]);
        $this->call([DfotoSeeder::class]);
        $this->call([cartSeeder::class]);
        $this->call([h_transSeeder::class]);
        $this->call([d_transSeeder::class]);
        $this->call([reviewSeeder::class]);

        // $this->call([UserSeeder::class,bajuSeeder::class,cartSeeder::class,d_bajuSeeder::class,d_transSeeder::class,DfotoSeeder::class,h_transSeeder::class,kategoriSeeder::class,kode_promoSeeder::class,reviewSeeder::class,sizeSeeder::class]);

    }
}
