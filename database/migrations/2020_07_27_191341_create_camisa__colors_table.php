<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCamisaColorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('camisa_colors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('camisas_id');
            $table->unsignedBigInteger('colors_id');
            $table->string('talla');
            $table->boolean('disponible');
            $table->string('ruta_img');
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
        Schema::dropIfExists('camisa__colors');
    }
}
