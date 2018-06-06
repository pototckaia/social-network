<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function(Blueprint $table){
           $table->increments('id');

           $table->unsignedInteger('id_owner');
           $table->string('title')->nullable();
           $table->text('content')->nullable();
           $table->boolean('comments_enable');
           $table->timestamps();
        });

        Schema::table('posts', function(Blueprint $table) {
            $table->foreign('id_owner')
                ->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');

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
