<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('motors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('brand');
            $table->text('image'); // URL gambar
            $table->integer('price'); // Harga per hari dalam rupiah (integer)
            $table->integer('year');
            $table->integer('cc');
            $table->string('transmission'); // Manual / Matic
            $table->string('fuel_type');
            $table->string('color');
            $table->decimal('rating', 3, 1)->default(0.0);
            $table->integer('review_count')->default(0);
            $table->string('plate_number')->nullable();
            $table->boolean('is_available')->default(true);
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('motors');
    }
};
