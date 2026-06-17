<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('motor_id')->constrained()->cascadeOnDelete();
            $table->string('start_date');
            $table->string('end_date');
            $table->integer('duration_days');
            $table->integer('total_price');
            $table->string('status')->default('Aktif'); // Aktif, Selesai, Dibatalkan
            $table->string('payment_method')->nullable();
            $table->string('pickup_location')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
