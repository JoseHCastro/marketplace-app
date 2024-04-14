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
      $table->integer('estado')->nullable();
      $table->double('precio')->nullable();
      $table->date('fecha_publicacion')->nullable();

      $table->unsignedBigInteger('user_id')->nullable();
      $table->unsignedBigInteger('categoria_id')->nullable();

      /* $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade'); */

      /* $table->foreign('categoria_id')
                ->references('id')
                ->on('categorias')
                ->onUpdate('cascade')
                ->onDelete('cascade'); */

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
