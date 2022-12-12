<?php

namespace Database\Seeders;

use App\Models\kode_promo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class kode_promoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET FOREIGN_KEY_CHECKS=0");
        DB::table("kode_promo")->truncate();
        DB::statement("SET FOREIGN_KEY_CHECKS=1");
        kode_promo::factory()->count(10)->create();
    }
}
