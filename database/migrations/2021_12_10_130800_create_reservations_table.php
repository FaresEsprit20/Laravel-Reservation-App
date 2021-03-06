<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id()->unsigned();
            $table->unsignedBigInteger('location_id');
            $table->unsignedBigInteger('locataire_id');
            $table->string('nom_groupe');
            $table->string('datedeb');
            $table->string('datefin');
            $table->string('datetimedeb');
            $table->string('datetimefin');
            $table->string('heuredeb');
            $table->string('heurefin');
            $table->string('jourdeb');
            $table->string('jourfin');
            $table->string('moisdeb');
            $table->string('moisfin');
            $table->string('andeb');
            $table->string('anfin');
            $table->unsignedInteger('archive_state')->default(0);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('locataire_id')->references('id')->on('locataires')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
