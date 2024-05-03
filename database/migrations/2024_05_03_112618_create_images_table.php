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
    Schema::create('images', function (Blueprint $table) {
      /* $table->id(); */
      $table->timestamps();

      $table->string('url');
      $table->unsignedBigInteger('imageable_id')->nullable(false);
      $table->string('imageable_type')->nullable(false);

      $table->primary('imageable_id', 'imageable_type')->nullable(false);
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('images');
  }
};
