<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string("title");
            $table->string("slug")->unique();
            $table->unsignedBigInteger("category_id")->nullable();
            $table->unsignedBigInteger("user_id")->nullable();
            $table->unsignedBigInteger("creator_user_id")->nullable();
            $table->text("excerpt")->nullable();
            $table->text("body")->nullable();
            $table->boolean("commentable")->default(true);
            $table->timestamp('published_at')->nullable();
            $table->timestamps();

            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('set null');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('set null');

            $table->foreign("creator_user_id")
                ->references("id")
                ->on("users")
                ->onDelete("set null");
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
};
