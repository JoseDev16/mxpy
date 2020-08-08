<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCamisasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('camisas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre_camisa');
            $table->longText('descripcion');
            $table->float('precio');
            $table->unsignedBigInteger('coleccions_id');
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
        Schema::dropIfExists('camisas');
    }
}
