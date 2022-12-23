<?php

namespace Database\Seeders;

use App\Models\baju;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class bajuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET FOREIGN_KEY_CHECKS=0");
        DB::table("baju")->truncate();
        DB::statement("SET FOREIGN_KEY_CHECKS=1");
        baju::factory()->count(17)->create();
    }
}
