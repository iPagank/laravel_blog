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

            $table->bigInteger('category_id')->unsigned();
            $table->bigInteger('user_id')->unsigned()->default(0);

            $table->string('title');
            $table->string('slug')->unique();

            //Выдержка
            $table->text('excerpt')->nullable();

            $table->text('content_raw');
            $table->text('content_html');

            $table->boolean('is_published')->default(0);
            $table->timestamp('published_at')->nullable();

            $table->string('img_url');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('user_id')->references('id')->on('users');
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
