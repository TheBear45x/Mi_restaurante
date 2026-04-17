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
        Schema::create('comentarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('platillo_id')->nullable();
            $table->text("comentario");
            $table->integer("calificacion");
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('platillo_id')->references('id')->on('platillos');

            $table->foreignId('user_id')->constrained(); 
// O de forma manual:
    $table->foreignId('user_id')->constrained()->onDelete('cascade');
$table->unsignedBigInteger('user_id');
            //aaa
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comentarios');
    }
};
