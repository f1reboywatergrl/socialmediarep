<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentLikeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_like', function (Blueprint $table) {
            $table->unsignedBigInteger('comment_id');
            $table->unsignedBigInteger('profil_id');
            $table->integer('like', 11);
            
            $table->foreign('comment_id')->references('id')->on('comments')->onDelete('cascade');
            $table->foreign('profil_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comment_like', function (Blueprint $table) {
            $table->dropForeign(['comment_id']);
            $table->dropColoumn(['comment_id']);

            $table->dropForeign(['profil_id']);
            $table->dropColoumn(['profil_id']);

            $table->dropColoumn(['like']);
        });
    }
}
