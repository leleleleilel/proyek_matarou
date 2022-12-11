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
        Schema::create('cart', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_dbaju');
            $table->foreign('id_dbaju')
                ->references('id')->on('d_baju')
                ->onDelete('cascade');
            $table->integer('quantity');
            $table->timestamp('deleted_at')->nullable()->default(null);
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')
                ->references('id')->on('user')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart');
    }
};
