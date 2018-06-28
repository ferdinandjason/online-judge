<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submissions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('problem_id');
            $table->integer('user_id')->unsigned();
            $table->integer('contest_id')->default(0);
            $table->float('time')->default(-1);
            $table->float('memory')->default(-1);
            $table->integer('verdict')->default(0);
            $table->string('lang');
            $table->mediumText('compile_result')->nullable();
            $table->string('verdict_result')->nullable();
            $table->timestamps();

            $table->foreign('problem_id')->references('id')->on('problems')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('codes', function (Blueprint $table) {
            $table->integer('id')->unsigned();
            $table->foreign('id')->references('id')->on('submissions')->onUpdate('cascade')->onDelete('cascade');
            $table->text('code');
            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('submissions');
        Schema::dropIfExists('codes');
    }
}
