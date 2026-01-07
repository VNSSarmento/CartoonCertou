<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

        dd($quiz);
    }

    private function prepareQuiz($value){
        $questions = [];

        //quantas questoes eu tenho
        $total_questions = count($this->app_data);
        //criar um indice unico para cada questão
        $indexes = range(0,$total_questions - 1);
        //embaralhar as ordens dos indices
        shuffle($indexes);
        //retirar apenas a quantidade de indices de acordo com a quantidade de questoes
        $indexes = array_slice($indexes,0,$value);
        //varivel auxiliar para iniciar o quiz
        $question_number = 1;

        //fazer o loop com
        foreach($indexes as $index){
            //array question com: indice da questao, pergunta, resposta correta, e 3 alternativas errada 
            $question = [];
            $question['question_number'] = $question_number++;
            $question['country'] = $this->app_data[$index]['country'];
            $question['result'] = $this->app_data[$index]['capital'];

            //um array com todas as alternativas
            $othersResults = array_column($this->app_data,'capital');

            //depois tirar do array a alternativa correta com o array diff
            $othersResults = array_diff( $othersResults, [$question['result']]);
            
            //misturar as alternativas erradas, pq sempre que chamar a proxima questao, nao vai vir as mesma alterantivas de sempre
            shuffle($othersResults);
            //inserir no array question as alternativas erradas
            $question['others_alternatives'] = array_slice($othersResults,0,3);
            //interir uma chave no array de correct = null que vai comparar a alternativa
            $question['select_alternative'] = null;

            //inserir o array de question no array de todas as questoes
            
            $questions[] = $question;
        }

        return $questions;

    }
}
