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
        session()->forget([
            'wrong_answer',
            'current_question',
            'correct_answers',
            'wrong_answers'
        ]);
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
        session()->put('current_shuffled_answers', $rawAnswers);

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

        $currentQuestion = session('current_question') - 1;

        $questionData = $quiz[$currentQuestion];
        $correctAnswerText = $questionData['result'];

        $isCorrect = ($correctAnswerText == $answer);

        if ($isCorrect) {
            session()->increment('correct_answers');
            $quiz[$currentQuestion]['correct'] = true;
        } else {
            session()->increment('wrong_answers');
            $quiz[$currentQuestion]['correct'] = false;
        }

        session()->put('quiz', $quiz);

        $rawAnswers = session('current_shuffled_answers');

        $labels = ['A', 'B', 'C', 'D'];
        $answersFormatted = [];

        foreach ($rawAnswers as $index => $text) {
            $state = 'default';

            if ($text === $answer) {
                $state = $isCorrect ? 'correct' : 'wrong';
            }

            //mostrar qual era a certa mesmo se ele errou
            if ($text === $correctAnswerText && !$isCorrect) {
                $state = 'correct';
            }

            $answersFormatted[] = [
                'label' => $labels[$index] ?? '',
                'state' => $state,
                'text' => $text
            ];
        }

        return view('game', [
            'question' => $questionData['questions'],
            'totalQuestions' => session('total_questions'),
            'currentQuestion' => $currentQuestion,
            'answers' => $answersFormatted,
            'showNextButton' => true
        ]);
    }

    public function nextQuestion()
    {
        $quiz = session('quiz');
        $current_question = session('current_question');
        $index = $current_question - 1;
        $total_questions = session('total_questions');

        if (is_null($quiz[$index]['correct'])) {
            return redirect()->route('game')
                ->with('error', '⚠️ Você precisa escolher uma resposta!');
        }

        // 2. Se já respondeu e chegou no fim
        if ($current_question >= $total_questions) {
            //dd(session()->all());    
            return redirect()->route('result');
        }

        // 3. Se respondeu, passa para a próxima
        session()->increment('current_question');
        return redirect()->route('game');

    }

    public function resultGame(): View{
        $corretAnswer = session('correct_answers');
        $totalQuestion = session('total_questions');
        $notion = round(( ($corretAnswer*100)/$totalQuestion),0);
        return view('result')->with('progress',$notion);
    }

}
