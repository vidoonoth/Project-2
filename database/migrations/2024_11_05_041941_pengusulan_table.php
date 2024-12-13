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
        Schema::create('pengusulan', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('user_id');
            $table->string('bookTitle', 255);
            $table->string('genre', 255);
            $table->string('isbn', 255)->nullable();
            $table->string('author', 255);
            $table->integer('publicationYear');
            $table->string('publisher', 255);
            $table->date('date');
            $table->string('bookImage')->nullable();
            $table->enum('status', ['diproses', 'diterima', 'tersedia', 'ditolak' ])->default('diproses');

            // Menambahkan kolom user_id untuk relasi dengan tabel users
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('pengusulan');
    }
};
