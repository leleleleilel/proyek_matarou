<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        Schema::create('h_trans', function (Blueprint $table) {
            $table->string('nomornota')->primary();
            $table->date('tanggal_trans');
            $table->unsignedBigInteger('fk_kode_promo');
            $table->foreign('fk_kode_promo')
                ->references('id')->on('kode_promo')
                ->onDelete('cascade');
            $table->integer('status')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('h_trans');
    }
};
