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
        // Create a new table
        Schema::create('tm_user', function (Blueprint $table) {
            $table->id(); // id auto increment
            $table->string('Email')->unique(); // email tidak boleh sama
            $table->string('Password');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop database
        Schema::dropIfExist('tm_user');
    }
};
