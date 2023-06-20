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
        // Users table
        Schema::create('users', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('username')->notNullable();
            $table->string('password')->notNullable();
            $table->string('name')->notNullable();
            $table->string('email')->notNullable();
            $table->string('address')->notNullable();
            $table->string('phone_number')->notNullable();
            $table->string('status')->default('active');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
