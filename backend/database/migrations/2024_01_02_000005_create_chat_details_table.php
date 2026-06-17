<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('chat_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('message_id')->constrained()->cascadeOnDelete();
            $table->text('text');
            $table->boolean('is_me')->default(false);
            $table->string('time');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chat_details');
    }
};
