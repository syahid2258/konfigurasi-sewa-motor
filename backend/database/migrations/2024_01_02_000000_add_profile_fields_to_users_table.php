<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->nullable()->after('email');
            $table->string('avatar')->nullable()->after('phone');
            $table->string('birth_date')->nullable()->after('avatar');
            $table->string('gender')->nullable()->after('birth_date');
            $table->string('occupation')->nullable()->after('gender');
            $table->text('address')->nullable()->after('occupation');
            $table->integer('points')->default(0)->after('address');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['phone', 'avatar', 'birth_date', 'gender', 'occupation', 'address', 'points']);
        });
    }
};
