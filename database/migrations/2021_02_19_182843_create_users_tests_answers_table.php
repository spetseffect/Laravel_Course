<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTestsAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_tests_answers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('users_tests_try_id');
            $table->bigInteger('test_questions_answer_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('users_tests_try_id')->references('id')->on('users_tests_tries');
            $table->foreign('test_questions_answer_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_tests_answers');
    }
}