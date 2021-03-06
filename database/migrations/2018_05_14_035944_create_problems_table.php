<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProblemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('problems', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug');
            $table->string('title');
            $table->longText('description');
            $table->text('sample_input');
            $table->text('sample_output');
            $table->integer('time_limit');
            $table->integer('memory_limit');
            $table->boolean('contest_only');
            $table->integer('total_submit')->default(0);
            $table->integer('total_ce')->default(0);
            $table->integer('total_ac')->default(0);
            $table->integer('total_wa')->default(0);
            $table->integer('total_rte')->default(0);
            $table->integer('total_tle')->default(0);
            $table->integer('total_mle')->default(0);
            $table->integer('total_fsc')->default(0);
            $table->integer('total_tl')->default(0);
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
        Schema::dropIfExists('problems');
    }
}
