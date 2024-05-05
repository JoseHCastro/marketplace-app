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
        Schema::create('anuncio_servicio', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_inicio');
            $table->date('fecha_fin');

            $table->unsignedBigInteger('anuncio_id');
            $table->unsignedBigInteger('servicio_id');

            $table->foreign('anuncio_id')
                ->references('id')
                ->on('anuncios')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('servicio_id')
                ->references('id')
                ->on('servicios')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anuncio_servicios');
    }
};
