<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('cars_model', function (Blueprint $table) {
      $table->increments("id_mobil");
      $table->string("merk");
      $table->string("type");
      $table->integer("harga");
      $table->integer("harga_fullday");
      $table->enum("transmisi", ["MT", "AT", "MT/AT"]);
      $table->string("deskripsi");
      $table->string("gambar");
      $table->timestamps();
    });


  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('cars_model');
  }
};
