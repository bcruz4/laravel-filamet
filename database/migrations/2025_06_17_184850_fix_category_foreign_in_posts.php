<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            // Quitar relación equivocada
            $table->dropForeign(['category_id']);

            // Agregar la relación correcta
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            // Opcional: volver a la relación anterior (no necesario en este caso)
            $table->dropForeign(['category_id']);
            $table->foreign('category_id')->references('id')->on('users');
        });
    }
};
