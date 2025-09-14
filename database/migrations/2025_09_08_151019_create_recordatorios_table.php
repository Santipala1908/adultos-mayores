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
        Schema::create('recordatorios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('senior_id');
            $table->string('titulo');
            $table->text('descripcion')->nullable();
            $table->dateTime('fecha_hora');
            $table->enum('estado', ['pendiente', 'completado'])->default('pendiente');
            $table->timestamps();

            //llave foranea
            $table->foreign('senior_id')->references('id')->on('seniors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recordatorios');
    }
};
