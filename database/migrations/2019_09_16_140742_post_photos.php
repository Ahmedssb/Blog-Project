<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PostPhotos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_photos', function (Blueprint $table) {
            $table->integer('post_id')->unsigned();
            $table->integer('photo_id')->unsigned();
            $table->timestamps();
            // make both post_id & photo_id as primary key for post_photos table 
            $table->primary(['post_id','photo_id']);

            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');;
            $table->foreign('photo_id')->references('id')->on('photos')->onDelete('cascade');;

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
