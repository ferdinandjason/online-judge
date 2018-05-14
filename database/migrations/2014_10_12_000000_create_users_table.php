<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('password');
            $table->string('username');
            $table->string('email')->unique();
            $table->string('real_name');
            $table->integer('isAdmin')->default(0);
            $table->string('avatar_path')->default('user/images/user.png');
            $table->string('institution')->nullable();
            $table->integer('total_submission')->default(0);
            $table->integer('total_ac')->default(0);
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
