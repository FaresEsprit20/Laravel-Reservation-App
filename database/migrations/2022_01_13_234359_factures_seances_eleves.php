<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FacturesSeancesEleves extends Migration
{    
      /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::create('factures_seances_eleves', function (Blueprint $table) {
        $table->engine = 'InnoDB';
        $table->bigIncrements('id');        
        $table->unsignedBigInteger('facture_id');
        $table->unsignedBigInteger('seance_id');
        $table->timestamps();
        
        $table->foreign('facture_id')
        ->references('id')
        ->on('factures')->onDelete('cascade');
        
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
        Schema::dropIfExists('factures_seances_eleves');
    }

}
