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
        Schema::create('tb_user', function (Blueprint $table) {
            $table->id();
            $table->text('username')->unique();
            $table->text('password');
            $table->text('email')->unique();
            $table->text('phone')->unique();
            $table->text('first_name');
            $table->text('last_name');
            $table->text('verify')->default('activated');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_user');
    }
};
