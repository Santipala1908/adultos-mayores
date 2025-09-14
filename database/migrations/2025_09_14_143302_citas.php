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
         Schema::create('citas', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('senior_id'); // Adulto mayor
        $table->unsignedBigInteger('registrado_por'); // Usuario que registra la cita
        $table->string('titulo'); // Motivo de la cita
        $table->text('descripcion')->nullable();
        $table->dateTime('fecha_hora'); // Fecha y hora de la cita
        $table->string('estado')->default('pendiente'); // pendiente, completada, cancelada
        $table->timestamps();

        // Relaciones
        $table->foreign('senior_id')->references('id')->on('seniors')->onDelete('cascade');
        $table->foreign('registrado_por')->references('id')->on('users')->onDelete('cascade');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
