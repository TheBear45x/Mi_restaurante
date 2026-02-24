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
        Schema::create('pedidos', function (Blueprint $table) {
    $table->id('id_pedido');
    $table->foreignId('id_cliente')->constrained('clientes', 'id_cliente');
    $table->foreignId('id_sucursal')->constrained('sucursales', 'id_sucursal');
    $table->dateTime('fecha_hora');
    $table->decimal('total', 10, 2);
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
