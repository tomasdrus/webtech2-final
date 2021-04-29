<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionWithAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('option_with_answers', function (Blueprint $table) {
            $table->id();
            $table->string('answer');
            $table->boolean('rightness');
            $table->unsignedBigInteger('question_with_answers_id');
            $table->foreign('question_with_answers_id')->references('id')->on('question_with_answers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('option_with_answers');
    }
}
