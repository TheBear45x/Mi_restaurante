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
        Schema::create('insumos', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->integer("cantidad");
            $table->string("unidad_medida");
            $table->decimal("costo",10,2);
            $table->unsignedBigInteger('provedor_id');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('provedor_id')->references('id')->on('provedores');
//aaaaa
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insumos');
    }
};
