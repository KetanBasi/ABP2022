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
        // Schema::create('kategori', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('nama_kategori');
        //     $table->unsignedBigInteger('produk_id');
        //     $table->timestamps();

        //     $table->foreignId('produk_id')->references('id')->on('table_produk')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('kategori');
    }
};
