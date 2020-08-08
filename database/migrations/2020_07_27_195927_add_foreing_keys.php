<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeingKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('camisa_colors', function (Blueprint $table) {
            
            
            $table->foreign('camisas_id')
                        ->references('id')->on('camisas')
                        ->onDelete('cascade');
                  
            
            $table->foreign('colors_id')
                        ->references('id')->on('colors')
                        ->onDelete('cascade');
        });
        
            #Relacion: Coleccion -> Camisa
            Schema::table('camisas', function (Blueprint $table) {
            
        
                $table->foreign('coleccions_id')
                      ->references('id')->on('coleccions')
                      ->onDelete('cascade');
            });

 
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
