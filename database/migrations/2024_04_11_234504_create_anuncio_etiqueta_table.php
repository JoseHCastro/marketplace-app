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
        Schema::create('anuncio_etiqueta', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('anuncio_id');
            $table->unsignedBigInteger('etiqueta_id');
            
            $table->foreign('anuncio_id')
                ->references('id')
                ->on('anuncios')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('etiqueta_id')
                ->references('id')
                ->on('etiquetas')
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
        Schema::dropIfExists('anuncio_etiquetas');
    }
};
