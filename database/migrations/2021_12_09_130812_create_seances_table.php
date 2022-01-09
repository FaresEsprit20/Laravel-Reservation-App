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
            $table->engine = 'InnoDB';
            $table->id()->unsigned();
            $table->string('date');
            $table->string('heure');
            $table->unsignedInteger('prixUnitaire');
            $table->unsignedBigInteger('locataire_id');
            $table->unsignedBigInteger('groupe_id');
            $table->unsignedBigInteger('location_id');
            $table->unsignedInteger('archive_state')->default(0);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
            $table->foreign('locataire_id')->references('id')->on('locataires')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('groupe_id')->references('id')->on('groupes')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('location_id')->references('id')->on('groupes')->onDelete('CASCADE')->onUpdate('CASCADE');
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
