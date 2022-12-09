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
        Schema::create('kode_promo', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('besar_potongan');
            $table->string('jenis_potongan');
            $table->date('valid_from');
            $table->date('valid_until');
            $table->integer('minimum_total');
            $table->integer('status');
            $table->timestamp('deleted_at')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kode_promo');
    }
};
