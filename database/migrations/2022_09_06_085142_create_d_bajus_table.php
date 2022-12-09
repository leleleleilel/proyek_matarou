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
        Schema::create('d_baju', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fk_baju');
            $table->foreign('fk_baju')
                ->references('id')->on('baju')
                ->onDelete('cascade');
            $table->integer('stok');
            $table->unsignedBigInteger('fk_size');
            $table->foreign('fk_size')
                ->references('id')->on('size')
                ->onDelete('cascade');
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('d_baju');
    }
};
