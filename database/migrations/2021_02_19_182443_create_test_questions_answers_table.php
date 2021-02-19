<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestQuestionsAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_questions_answers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('question_id');
            $table->string('answers',500);
            $table->string('image',255);
            $table->integer('weight');
            $table->foreign('question_id')->references('id')->on('test_questions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('test_questions_answers');
    }
}
