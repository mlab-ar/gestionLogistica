<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('nombre');
          $table->string('apellido');
          $table->string('empresa');
          $table->string('cargo');
          $table->string('area');
          $table->string('dni');
          $table->string('telefono');
          $table->string('celular');
          $table->string('email');
          $table->string('web');
          $table->unsignedbigInteger('evento_id');
          $table->foreign('evento_id')->references('id')->on('eventos');
          $table->string('activo');
          $table->string('estado');

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
        Schema::dropIfExists('personas');
    }
}
