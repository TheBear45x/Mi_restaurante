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
        Schema::create('sucursales', function (Blueprint $table) {
            $table->id();
            $table->string("numero_sucursal");
            $table->string("calle");
            $table->string("telefono");
            $table->string("gerente");
            $table->string("codigo_postal");
            $table->enum("estatus",[
                "operacion",
                "remodelacion",
                "cierre_temporal",
                "cierre_permanente"
                ]);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sucursales');
    }
};
