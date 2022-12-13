<?php

namespace Database\Seeders;

use App\Models\kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class kategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET FOREIGN_KEY_CHECKS=0");
        DB::table("kategori")->truncate();
        DB::statement("SET FOREIGN_KEY_CHECKS=1");
        kategori::factory()->count(5)->create();
    }
}
