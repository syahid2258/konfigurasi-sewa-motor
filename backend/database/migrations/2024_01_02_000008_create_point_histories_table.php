<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('point_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->integer('points');
            $table->boolean('is_earned')->default(true);
            $table->string('date');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('point_histories');
    }
};
