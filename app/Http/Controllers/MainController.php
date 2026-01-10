<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\View\View;

class MainController extends Controller
{
    private $app_data;

    public function __construct()
    {
        $this->app_data = require(app_path('app_data.php'));
    }

    public function showData()
    {
        return response()->json($this->app_data);
    }

    public function startGame(): View
    {

        return view('home');
    }

    public function prepareGame(Request $request)
    {

        $validated = $request->validate(
            [
                'questions' => 'required|integer|min:3|max:50'
            ],
            [
                'questions.required' => 'quantidades de questões obrigatorias!',
                'questions.integer' => 'o valor inserido deve ser um numero inteiro',
                'questions.min' => 'é necessario no minimo :min questões!',
                'questions.max' => 'é necessario no maximo :max questões!',
            ]
        );

        $value = intval($request->input('questions'));

        $quiz = $this->prepareQuiz($value);

        session()->put([
            'quiz' => $quiz,
            'total_questions' => $value,
            'current_question' => 1,
            'correct_answers' => 0,
            'wrong_answers' => 0,
        ]);

        return redirect()->route('game');
    }

    private function prepareQuiz($value)
    {
        $questions = [];

        $total_questions = count($this->app_data);
        $indexes = range(0, $total_questions - 1);
        shuffle($indexes);
        $indexes = array_slice($indexes, 0, $value);
        $question_number = 1;

        foreach ($indexes as $index) {
            $question = [];
            $question['question_number'] = $question_number++;
            $question['questions'] = $this->app_data[$index]['country'];
            $question['result'] = $this->app_data[$index]['capital'];

            $othersResults = array_column($this->app_data, 'capital');

            $othersResults = array_diff($othersResults, [$question['result']]);

            shuffle($othersResults);
            $question['wrong_answers'] = array_slice($othersResults, 0, 3);
            $question['correct'] = null;

            $questions[] = $question;
        }

        return $questions;
    }

    public function game()
    {
        $quiz = session('quiz');
        $totalQuestions = session('total_questions');
        $currentQuestion = session('current_question') - 1;


        $rawAnswers = $quiz[$currentQuestion]['wrong_answers'];
        $rawAnswers[] = $quiz[$currentQuestion]['result'];

        shuffle($rawAnswers);

        $labels = ['A', 'B', 'C', 'D'];
        $answers = [];

        foreach ($rawAnswers as $index => $text) {
            $answers[] = [
                'label' => $labels[$index],
                'text' => $text,
                'correct' => $text === $quiz[$currentQuestion]['result'],
                'state' => 'default',
            ];
        }

        return view('game', [
            'question' => $quiz[$currentQuestion]['questions'],
            'totalQuestions' => $totalQuestions,
            'currentQuestion' => $currentQuestion,
            'answers' => $answers
        ]);
    }

    public function answer($encrypAnswer)
    {

        try {
            $answer = Crypt::decryptString($encrypAnswer);
        } catch (Exception $e) {
            return redirect()->route('game');
        }

        $quiz = session('quiz');
        $currentQuestion = $quiz['current_question'] - 1;
        $corretAnswer = $quiz[$currentQuestion]['result'];
        $corretAnswers = session('correct_answer');
        $wrongAnswers = session('wrong_answer');

        if ($corretAnswer == $answer) {
            $corretAnswers++;
            $quiz[$currentQuestion]['correct'] = true;
        } else {
            $wrongAnswers++;
            $quiz[$currentQuestion]['correct'] = false;
        }

        session()->put([
            'quiz' => $quiz,
            'correctAnswers' => $corretAnswers,
            'wrongAnswers' => $wrongAnswers,
        ]);

        $data = [
            'country' => $quiz[$corretAnswer]['question']
        ]
    }
}
