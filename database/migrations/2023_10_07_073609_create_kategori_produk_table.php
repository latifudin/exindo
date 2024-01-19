<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kategori_produk', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('kategori_id');
            $table->unsignedBiginteger('produk_id');


            $table->foreign('kategori_id')
                    ->references('id')
                    ->on('kategori')
                    ->onDelete('cascade');
            $table->foreign('produk_id')
                    ->references('id')
                    ->on('produk')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategori_produk');
    }
};
