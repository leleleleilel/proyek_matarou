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
        Schema::create('d_foto_baju', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_baju');
            $table->foreign('id_baju')
                ->references('id')->on('baju')
                ->onDelete('cascade');
            $table->text('nama_file');
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
        Schema::dropIfExists('dfoto_baju');
    }
};
