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
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_pago');
            $table->double('monto');

            $table->unsignedBigInteger('anuncio_id')->nullable();
            $table->unsignedBigInteger('user_id');
<<<<<<< HEAD:database/migrations/2024_04_11_234721_create_pagos_table.php
            $table->string('stripe_payment_id');

=======
            $table->unsignedBigInteger('membresia_id')->nullable();
>>>>>>> 1030e5dc037168be58a3777e3e148ea2e814a528:database/migrations/2025_04_11_234721_create_pagos_table.php
            $table->foreign('anuncio_id')
                ->references('id')
                ->on('anuncios')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('membresia_id')
                ->references('id')
                ->on('membresias')
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
        Schema::dropIfExists('pagos');
    }
};
