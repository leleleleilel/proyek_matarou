<?php

namespace Database\Seeders;

use App\Models\Dfoto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DfotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET FOREIGN_KEY_CHECKS=0");
        DB::table("Dfoto")->truncate();
        DB::statement("SET FOREIGN_KEY_CHECKS=1");
        Dfoto::factory()->count(10)->create();
    }
}
