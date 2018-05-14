<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('id');
            $table->primary('id');
            $table->string('title');
            $table->longText('description');
            $table->text('sample_input');
            $table->text('sample_output');
            $table->timestamps('time_limit');
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
