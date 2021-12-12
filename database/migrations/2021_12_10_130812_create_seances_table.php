<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seances', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->string('heure');
            $table->bigInteger('id_locataire')->unsigned();
            $table->bigInteger('id_groupe')->unsigned();
            $table->integer('archive_state')->unsigned()->default(0);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
            $table->foreign('id_locataire')->references('id')->on('locataires')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_groupe')->references('id')->on('groupes')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seances');
    }
}
