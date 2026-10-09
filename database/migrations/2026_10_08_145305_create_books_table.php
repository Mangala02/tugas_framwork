<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id(); // PK | BigInt, Auto Increment[cite: 3]
            $table->foreignId('category_id')->constrained('categories')->onDelete('restrict'); // FK dengan proteksi constraint[cite: 3, 4]
            $table->string('title', 255); // Varchar 255[cite: 3]
            $table->string('author', 100); // Varchar 100[cite: 3]
            $table->integer('published_year'); // Integer[cite: 3]
            $table->integer('stock'); // Integer[cite: 3]
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};