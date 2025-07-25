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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories'); // ✅ corrección aquí

            $table->string('title');
            $table->string('slug')->unique(); // ✅ buena práctica
            $table->text('body');
            $table->string('img_url');
            $table->string('cite')->nullable();     // ✅ campo nuevo
            $table->string('pdf_url')->nullable();  // ✅ campo nuevo
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
