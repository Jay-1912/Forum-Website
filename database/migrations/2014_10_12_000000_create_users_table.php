<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->boolean('is_admin')->default(0);

            $table->string('country')->nullable();
            $table->string('profession')->nullable();
            $table->text('bio')->nullable();
            $table->text('skills')->nullable();
            $table->text('education')->nullable();

            $table->boolean('is_deleted')->default(0);
            $table->boolean('is_verified')->default(0);
            $table->boolean('is_banned')->default(0);
            $table->integer('rank')->default(0);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
