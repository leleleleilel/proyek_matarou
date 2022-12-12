<?php

namespace Database\Seeders;

use App\Models\d_trans;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class d_transSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET FOREIGN_KEY_CHECKS=0");
        DB::table("d_trans")->truncate();
        DB::statement("SET FOREIGN_KEY_CHECKS=1");
        d_trans::factory()->count(10)->create();
    }
}
