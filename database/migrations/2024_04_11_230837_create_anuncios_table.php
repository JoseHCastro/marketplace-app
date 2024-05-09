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
    Schema::create('anuncios', function (Blueprint $table) {
      $table->id();
      $table->string('titulo')->nullable();
      $table->text('descripcion')->nullable();
      //$table->string('descripcion');
      $table->double('precio')->nullable();
      $table->date('fecha_publicacion')->nullable();
      $table->date('fecha_expiracion')->nullable();
      $table->unsignedInteger('visitas')->nullable();

      $table->unsignedBigInteger('categoria_id')/* ->nullable() */;
      $table->unsignedBigInteger('condicion_id')/* ->unique() *//* ->nullable() */;

      /* $table->unsignedBigInteger('estado_id'); */
      $table->unsignedBigInteger('moneda_id');
      $table->unsignedBigInteger('user_id');

      $table->boolean('disponible')->default(true);
      $table->boolean('habilitado')->default(true);

      /* $table->unsignedBigInteger('departamento_id')->nullable();
      $table->unsignedBigInteger('provincia_id')->nullable(); */

      $table->foreign('condicion_id')
        ->references('id')
        ->on('condiciones')
        ->onDelete('cascade')
        ->onUpdate('cascade');


      $table->foreign('categoria_id')
        ->references('id')
        ->on('categoria')
        ->onDelete('cascade')
        ->onUpdate('cascade');


      /* $table->foreign('estado_id')
        ->references('id')
        ->on('estados')
        ->onDelete('cascade')
        ->onUpdate('cascade'); */

      $table->foreign('moneda_id')
        ->references('id')
        ->on('monedas')
        ->onDelete('cascade')
        ->onUpdate('cascade');

      $table->foreign('user_id')
        ->references('id')
        ->on('users')
        ->onDelete('cascade')
        ->onUpdate('cascade');

      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('anuncios');
  }
};
