<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_questions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('test_id')->unsigned();
            $table->bigInteger('question_group_id')->unsigned();
            $table->boolean('multiple_choice')->default(0);
            $table->integer('number_sort');
            $table->string('task',1000);
            $table->string('image',255);
            $table->foreign('test_id')->references('id')->on('tests');
            $table->foreign('question_group_id')->references('id')->on('question_groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('test_questions');
    }
}
