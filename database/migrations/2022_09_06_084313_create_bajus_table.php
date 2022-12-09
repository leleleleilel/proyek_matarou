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
        Schema::create('baju', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->string('nama');
            $table->longText('deskripsi');
            $table->integer('harga');
            $table->unsignedBigInteger('fk_kategori');
            $table->foreign('fk_kategori')
                ->references('id')->on('kategori')
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
        Schema::dropIfExists('baju');
    }
};
