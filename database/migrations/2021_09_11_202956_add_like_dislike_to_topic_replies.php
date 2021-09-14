<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLikeDislikeToTopicReplies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('topic_replies', function (Blueprint $table) {
            //
            $table->bigInteger('liked')->default(0)->after('topic_id');
            $table->bigInteger('disliked')->default(0)->after('liked');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('topic_replies', function (Blueprint $table) {
            //
            $table->dropColumn('liked');
            $table->dropColumn('disliked');
        });
    }
}
