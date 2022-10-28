<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFcVoteResultTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fc_vote_result', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('number')->nullable()->comment('编号');
            $table->dateTime('start_time')->nullable()->comment('开始答题时间');
            $table->dateTime('end_time')->nullable()->comment('结束答题时间');
            $table->string('name')->nullable()->comment('姓名');
            $table->bigInteger('mobile')->nullable()->comment('手机号码');
            $table->string('vote_number')->nullable()->comment('要投的4个号码');
            $table->integer('vote_number_one')->nullable()->comment('号码1');
            $table->integer('vote_number_two')->nullable()->comment('号码2');
            $table->integer('vote_number_three')->nullable()->comment('号码3');
            $table->integer('vote_number_four')->nullable()->comment('号码4');
            $table->integer('win_num')->default('0')->nullable()->comment('中胆数量');
            $table->integer('date')->nullable()->comment('答题日期');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fc_vote_result');
    }
}
