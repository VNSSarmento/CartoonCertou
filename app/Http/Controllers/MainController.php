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
        
        //criar um indice unico para cada questão
        
        //embaralhar as ordens dos indices
        
        //retirar apenas a quantidade de indices de acordo com a quantidade de questoes
        
        //varivel auxiliar para iniciar o quiz

         
        //fazer o loop com
        //array question com: indice da questao, pergunta, resposta correta, e 3 alternativas errada 
        //um array com todas as alternativas
        //depois tirar do array a alternativa correta com o array diff
        //misturar as alternativas erradas
        //inserir no array question as alternativas erradas
        //interir uma chave no array de correct = null que vai comparar a alternativa
        //inserir o array de question no array de todas as questoes

    }
}
