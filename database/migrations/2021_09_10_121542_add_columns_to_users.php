<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('country')->nullable()->after('address');
            $table->string('profession')->nullable()->after('country');
            $table->text('bio')->nullable()->after('profession');
            $table->text('skills')->nullable()->after('bio');
            $table->text('education')->nullable()->after('skills');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['country'],['profession'],['bio'],['skills'],['education']);
        });
    }
}
