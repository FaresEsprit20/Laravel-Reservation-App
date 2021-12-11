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
            $table->id();
            $table->bigInteger('id_location');
            $table->bigInteger('id_locataire');
            $table->string('nom_groupe');
            $table->string('datedeb');
            $table->string('datefin');
            $table->string('heuredeb');
            $table->string('heurefin');
            $table->string('jourdeb');
            $table->string('jourfin');
            $table->string('moisdeb');
            $table->string('moisfin');
            $table->string('andeb');
            $table->string('anfin');
            $table->string('archive_state');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
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
