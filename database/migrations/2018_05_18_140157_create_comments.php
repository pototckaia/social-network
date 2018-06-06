<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_post');
            $table->unsignedInteger('id_parent');
            $table->unsignedInteger('id_owner');
            $table->text('content');
            $table->timestamps();

        });

        Schema::table('comments', function(Blueprint $table) {
            $table->foreign('id_post')
                ->references('id')->on('posts')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('id_parent')
                ->references('id')->on('comments')
                ->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('comments');
    }
}
