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
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->string('un_nombre');
            $table->enum('un_estado', ['ACTIVO', 'INACTIVO', 'ELIMINADO'])->default('ACTIVO');
            $table->unsignedBigInteger('piso_id')->index('piso_id');
            $table->foreign('piso_id')->references('id')->on('ambientes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unidades');
    }
};
