<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->id();
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
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
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
        Schema::dropIfExists('tests');
    }
};
