<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->bigInteger("category_id")->nullable();
            $table->timestamps();

            $table->text("body");
            $table->string("title");
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
