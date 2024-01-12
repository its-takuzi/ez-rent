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
        Schema::create('mobils', function (Blueprint $table) {
            $table->id();
            $table->string('plat_mobil');
            $table->string('merk_mobil');
            $table->string('bahan_bakar');
            $table->integer('muatan');
            $table->string('gambar');
            $table->bigInteger('harga_per_hari');
            $table->string('status');

            //foreign key
            $table->foreignId('rental_id')->constrained('rentals')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobils');
    }
};
