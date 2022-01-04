<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class Seanceseleves extends Migration
{
      /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::create('seances_eleves', function (Blueprint $table) {
        $table->bigIncrements('id');        
        $table->string('seance_id');
        $table->string('eleve_id');
        $table->unsignedSmallInteger('absent')->default(0);
        $table->unsignedBigInteger('payement')->default(0);
        $table->timestamps();
        
        $table->foreign('eleve_id')
        ->references('id')
        ->on('eleves')->onDelete('cascade');
        
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
        Schema::dropIfExists('seances_eleves');
    }



}
