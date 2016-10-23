<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
            $table->timestamp('started_at');
            $table->timestamp('finished_at');
        });

        Schema::create('problem_quiz', function (Blueprint $table) {
          $table->increments('id');
          $table->unsignedInteger('problem_id');
          $table->unsignedInteger('quiz_id');

          $table->foreign('problem_id')->references('id')->on('problems')->onDelete('cascade');
          $table->foreign('quiz_id')->references('id')->on('quizzes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('problem_quiz');
        Schema::dropIfExists('quizzes');
    }
}
