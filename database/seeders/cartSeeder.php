<?php

namespace Database\Seeders;

use App\Models\cart;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class cartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET FOREIGN_KEY_CHECKS=0");
        DB::table("cart")->truncate();
        DB::statement("SET FOREIGN_KEY_CHECKS=1");
        cart::factory()->count(10)->create();
    }
}
