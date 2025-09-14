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
        Schema::create('notas__saluds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('senior_id');
            $table->unsignedBigInteger('registrado_por')->nullable();// ID del usuario que registra la nota
            $table->text('observacion');
            $table->date('fecha_nota');
            $table->timestamps();

            // Llaves foráneas
            $table->foreign('senior_id')->references('id')->on('seniors')->onDelete('cascade');
            $table->foreign('registrado_por')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notas__saluds');
    }
};
