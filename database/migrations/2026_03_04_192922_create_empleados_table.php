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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_empleado', 20)->unique();
            $table->unsignedBigInteger('persona_id');
            $table->unsignedBigInteger('sucursal_id');
            $table->string("puesto");
            $table->decimal("salario",10,2)->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('persona_id')->references('id')->on('personas');
            $table->foreign('sucursal_id')->references('id')->on('sucursales');
            //aaaaa
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
