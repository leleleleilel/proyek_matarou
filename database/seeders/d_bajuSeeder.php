<?php

namespace Database\Seeders;

use App\Models\d_baju;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class d_bajuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET FOREIGN_KEY_CHECKS=0");
        DB::table("d_baju")->truncate();
        DB::statement("SET FOREIGN_KEY_CHECKS=1");
        d_baju::factory()->count(10)->create();
    }
}
