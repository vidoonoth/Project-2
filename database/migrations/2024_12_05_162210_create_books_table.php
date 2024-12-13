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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('bookTitle');
            $table->string('genre');
            $table->string('isbn')->nullable();
            $table->string('author');
            $table->string('publicationYear');
            $table->string('publisher');
            $table->text('description');
            $table->text('synopsis');
            $table->string('bookImage')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
