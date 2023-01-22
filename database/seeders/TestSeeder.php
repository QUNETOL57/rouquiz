<?php

namespace Database\Seeders;

use App\Enums\QuestionLevelEnum;
use App\Models\Answer;
use App\Models\Question;
use App\Models\Test;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $test = Test::factory()->create([
            'name' => 'Язык JavaScript',
            'is_show_answer' => 'false',
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        $question = Question::factory()->create([
            'text' => 'Язык JavaScript является подвидом языка Java – верно?',
            'level' => QuestionLevelEnum::EASY,
            'time' => 60,
            'test_id' => $test->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Answer::factory()->create([
            'text' => 'Да',
            'question_id' => $question->id,
            'is_true' => false,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Answer::factory()->create([
            'text' => 'нет',
            'question_id' => $question->id,
            'is_true' => true,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Answer::factory()->create([
            'text' => 'Наоборот, Java – подвид JavaScript',
            'question_id' => $question->id,
            'is_true' => false,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        $question = Question::factory()->create([
            'text' => 'Что такое ECMAScript?',
            'level' => QuestionLevelEnum::HARD,
            'time' => 60,
            'test_id' => $test->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Answer::factory()->create([
            'text' => 'Новый язык программирования.',
            'question_id' => $question->id,
            'is_true' => false,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Answer::factory()->create([
            'text' => 'Спецификация языка Javascript.',
            'question_id' => $question->id,
            'is_true' => true,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Answer::factory()->create([
            'text' => 'Переработанная реализация Javascript.',
            'question_id' => $question->id,
            'is_true' => false,
            'created_by' => 1,
            'updated_by' => 1,
        ]);


        $question = Question::factory()->create([
            'text' => '1',
            'level' => QuestionLevelEnum::MEDIUM,
            'time' => 120,
            'test_id' => $test->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Answer::factory()->create([
            'text' => '1',
            'question_id' => $question->id,
            'is_true' => false,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Answer::factory()->create([
            'text' => 'NaN',
            'question_id' => $question->id,
            'is_true' => false,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Answer::factory()->create([
            'text' => 'undefined',
            'question_id' => $question->id,
            'is_true' => false,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Answer::factory()->create([
            'text' => '12',
            'question_id' => $question->id,
            'is_true' => true,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Answer::factory()->create([
            'text' => 'Другое.',
            'question_id' => $question->id,
            'is_true' => false,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        $question = Question::factory()->create([
            'text' => 'Сколько параметров можно передать функции ?',
            'level' => QuestionLevelEnum::HARD,
            'time' => 180,
            'test_id' => $test->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Answer::factory()->create([
            'text' => 'Ровно столько, сколько указано в определении функции.',
            'question_id' => $question->id,
            'is_true' => false,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Answer::factory()->create([
            'text' => 'Сколько указано в определении функции или меньше.',
            'question_id' => $question->id,
            'is_true' => false,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Answer::factory()->create([
            'text' => 'Сколько указано в определении функции или больше.',
            'question_id' => $question->id,
            'is_true' => false,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Answer::factory()->create([
            'text' => 'Любое количество.',
            'question_id' => $question->id,
            'is_true' => true,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
    }
}

