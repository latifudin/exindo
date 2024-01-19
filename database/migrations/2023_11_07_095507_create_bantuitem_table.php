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
        Schema::create('bantuitem', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bantu_id');
            $table->string('judul');
            $table->longText('isi');
            $table->timestamps();

            $table->foreign('bantu_id')->references('id')->on('bantu')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bantuitem');
    }
};
