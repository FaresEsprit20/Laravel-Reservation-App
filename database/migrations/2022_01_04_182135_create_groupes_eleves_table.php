<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupesElevesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groupes_eleves', function (Blueprint $table) {
        $table->engine = 'InnoDB';
        $table->bigIncrements('id');        
        $table->unsignedBigInteger('eleve_id');
        $table->unsignedBigInteger('groupe_id');
        $table->timestamps();
        
        $table->foreign('eleve_id')
        ->references('id')
        ->on('eleves')->onDelete('cascade');
        
        $table->foreign('groupe_id')
              ->references('id')
              ->on('groupes')->onDelete('cascade');
        
        
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groupes_eleves');
    }

    
}
