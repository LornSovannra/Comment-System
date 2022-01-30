<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("post_id");
            $table->string("user_comment_name");
            $table->string("user_comment_content");
            $table->string("user_comment_profile_image");
            $table->string("user_comment_date");
        });
    }

    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
