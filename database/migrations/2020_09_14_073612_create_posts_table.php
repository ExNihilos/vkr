<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('title')->nullable();
            $table->text('text')->nullable();
            $table->boolean('isPublished')->nullable();
            $table->dateTime('publication_date')->nullable();
            $table->integer('rating')->default(0)->nullable();
            //$table->bigInteger('user_id')->nullable()->unsigned();
            $table->foreignId('user_id')->default(1)->references('id')->on('users');
            //$table->string('link')->nullable();
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
