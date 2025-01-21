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
        Schema::create('computadoras', function (Blueprint $table) {
            $table->id();
            $table->string('co_nombre');
            $table->string('co_ip');
           
            $table->string('co_pantalla');
            $table->string('co_parlante');
            $table->string('co_teclado');
            $table->string('co_maus');
            $table->string('co_procesador');
            $table->string('co_ram');
            $table->string('co_almacenamiento');
            $table->string('co_video');
            $table->string('co_nic');
            $table->string('co_sonido');
            $table->string('co_targmadre');
            $table->string('co_fuente');

            $table->enum('pe_estado', ['ACTIVO', 'INACTIVO', 'ELIMINADO'])->default('ACTIVO');
            $table->unsignedBigInteger('personal_id')->index('personal_id');
            $table->foreign('personal_id')->references('id')->on('personal');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('computadoras');
    }
};
