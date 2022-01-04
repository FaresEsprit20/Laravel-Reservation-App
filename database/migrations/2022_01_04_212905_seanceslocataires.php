<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Seanceslocataires extends Migration
{
   
  /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::create('seances_locataires', function (Blueprint $table) {
        $table->bigIncrements('id');        
        $table->string('seance_id');
        $table->string('locataire_id');
        $table->unsignedSmallInteger('absent')->default(0);
        $table->unsignedBigInteger('payement')->default(0);
        $table->timestamps();
        
        $table->foreign('locataire_id')
        ->references('id')
        ->on('locataires')->onDelete('cascade');
        
        $table->foreign('seance_id')
              ->references('id')
              ->on('seances')->onDelete('cascade');
                
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seances_locataires');
    }


}
