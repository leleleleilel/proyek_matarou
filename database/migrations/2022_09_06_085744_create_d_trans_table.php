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
        Schema::create('d_trans', function (Blueprint $table) {
            $table->string('nomornota')->primary();
            $table->unsignedBigInteger('fk_dbaju');
            $table->foreign('fk_dbaju')
                ->references('id')->on('d_baju')
                ->onDelete('cascade');
            $table->integer('qty');
            $table->unsignedBigInteger('harga');
            $table->unsignedBigInteger('subtotal');
        });
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
