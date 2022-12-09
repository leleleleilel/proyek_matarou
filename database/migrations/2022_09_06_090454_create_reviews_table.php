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
        Schema::create('review', function (Blueprint $table) {
            $table->id();
            $table->integer('rate');
            $table->longText('deskripsi_review');
            $table->string('fk_htrans');
            $table->foreign('fk_htrans')
                ->references('nomornota')->on('h_trans')
                ->onDelete('cascade');
            $table->unsignedBigInteger('fk_baju');
            $table->foreign('fk_baju')
                ->references('id')->on('baju')
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
        Schema::dropIfExists('review');
    }
};
