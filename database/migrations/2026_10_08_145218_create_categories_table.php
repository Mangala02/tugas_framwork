<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // PK | BigInt, Auto Increment[cite: 3]
            $table->string('name', 100)->unique(); // Varchar 100, Unique[cite: 3, 6]
            $table->text('description')->nullable(); // Text, Nullable[cite: 3]
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};