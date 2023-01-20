<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('cmnt_id');
            $table->unsignedBigInteger('cmnt_blog_id')->index()->nullable();
            $table->foreign('cmnt_blog_id')->references('blog_id')->on('blogs')->onDelete('cascade');
            $table->unsignedBigInteger('cmnt_created_by')->index()->nullable();
            $table->foreign('cmnt_created_by')->references('id')->on('users')->onDelete('cascade');
            $table->text('cmnt_content',200);
            $table->softDeletes();
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
        Schema::dropIfExists('comments');
    }
}
