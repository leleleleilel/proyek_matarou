<?php

namespace Database\Seeders;

use App\Models\h_trans;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class h_transSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET FOREIGN_KEY_CHECKS=0");
        DB::table("h_trans")->truncate();
        DB::statement("SET FOREIGN_KEY_CHECKS=1");
        h_trans::factory()->count(10)->create();
    }
}
