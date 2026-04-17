<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('provedores', function (Blueprint $table) {
        $table->id();
        $table->string('nombre');
        $table->string('encargado');
        $table->string('telefono')->nullable(); // nullable por si no tienen el dato a la mano
        $table->string('correo')->nullable();
        $table->boolean('estatus')->default(1); // 1 para activo, 0 para inactivo
        $table->timestamps();
        $table->softDeletes(); // Si usas SoftDeletes en el modelo
    });
}

    /**
     * Reverse the migrations.
     */ 
    public function down(): void
    {
        Schema::dropIfExists('provedores');
    }
};
