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
        Schema::create('practicas', function (Blueprint $table) {
            $table->id();
            $table->string('docente');
            $table->string('empresa');
            $table->date('fecha_inicio');
            $table->date('fecha_final')->nullable();
            $table->boolean('terminado')->default(false);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('modulo_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('modulo_id')->references('id')->on('modulos');
            $table->unique(['user_id', 'modulo_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('practicas');
    }
};
