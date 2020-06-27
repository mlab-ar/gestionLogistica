<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('url');
            $table->mediumText('intro')->nullable();
            $table->text('body')->nullable();
            $table->unsignedbigInteger('evento_id');
            $table->foreign('evento_id')->references('id')->on('eventos');
            $table->timestamp('published_at')->nullable();
            $table->string('activo');
            $table->string('destacado');        
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
        Schema::dropIfExists('posts');
    }
}
