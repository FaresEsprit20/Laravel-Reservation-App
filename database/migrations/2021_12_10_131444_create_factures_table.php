<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factures', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_eleve')->unsigned();
            $table->bigInteger('id_groupe')->unsigned();
            $table->string('nbrseances');
            $table->string('prixtotalseances');
            $table->string('paid');
            $table->string('topay');
            $table->string('dateheure');
            $table->integer('archive_state')->unsigned()->default(0);
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
        Schema::dropIfExists('factures');
    }


}
