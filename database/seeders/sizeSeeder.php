<?php

namespace Database\Seeders;

use App\Models\size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class sizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET FOREIGN_KEY_CHECKS=0");
        DB::table("size")->truncate();
        DB::statement("SET FOREIGN_KEY_CHECKS=1");
        size::factory()->count(7)->create();
    }
}
