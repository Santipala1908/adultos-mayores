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
        Schema::create('conversaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('senior_id');
            $table->text('mensaje_usuario');
            $table->text('respuesta_IA');
            $table->dateTime('fecha_hora')->default(now());
            $table->timestamps();

            // Llave foránea
            $table->foreign('senior_id')->references('id')->on('seniors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conversaciones');
    }
};
