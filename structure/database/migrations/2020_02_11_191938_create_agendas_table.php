<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendas', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('nombre');
          $table->string('moderadores');
          $table->string('activo');
          $table->integer('orden');
          $table->string('hora_inicio');
          $table->string('hora_fin');
          $table->unsignedbigInteger('speaker_id');
          $table->foreign('speaker_id')->references('id')->on('speakers');
          $table->unsignedbigInteger('evento_id');
          $table->foreign('evento_id')->references('id')->on('eventos');

          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agendas');
    }
}
