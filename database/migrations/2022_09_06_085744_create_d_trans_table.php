<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Schema::create('d_trans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fk_dbaju');
            $table->foreign('fk_dbaju')
                ->references('id')->on('d_baju')
                ->onDelete('cascade');
            $table->integer('qty');
            $table->unsignedBigInteger('harga');
            $table->unsignedBigInteger('subtotal');
            $table->unsignedBigInteger('fk_htrans');
            $table->foreign('fk_htrans')
                ->references('id')->on('h_trans')
                ->onDelete('cascade');
        });
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('d_trans');
    }
};
