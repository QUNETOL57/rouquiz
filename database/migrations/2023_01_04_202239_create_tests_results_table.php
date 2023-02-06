<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('test_id')->constrained();
            $table->string('name');
            $table->text('description');
            $table->integer('time_limit');
            $table->integer('pass_percentage');
            $table->boolean('is_show_correct_answer');
            $table->boolean('is_shuffle_questions');
            $table->boolean('is_shuffle_answer');
            $table->boolean('is_show_all_questions');
            $table->boolean('can_return');
            $table->boolean('use_all_questions');
            $table->integer('count_use_questions');

            $table->integer('current_answer');
            $table->integer('time_spend');
            $table->integer('right_answers');
            $table->integer('leaves_count');
            $table->integer('is_over');

            $table->jsonb('questions_json');
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
        Schema::dropIfExists('test_results');
    }
};
