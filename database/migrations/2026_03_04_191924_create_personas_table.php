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
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string("nombres");
            $table->string("apaterno");
            $table->string("amaterno");
            $table->integer("edad");
            $table->string("correo")->unique();
            $table->string("telefono",15);
            $table->string("password");
            $table->enum("rol", ["cliente","empleado","admin"]);
            $table->boolean("estatus")->default(true);

            $table->string('google_id')->nullable()->unique();
            
            $table->softDeletes();
            $table->timestamps();
            //aaa
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};
