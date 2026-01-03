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

    public function prepareGame($request)
    {

        $validated = $request->validate(
            [
                'questions' => 'required|integer|min:3|max:50'
            ],
            [
                'questions.required' => 'quantidades de questões obrigatorias!',
                'questions.min' => 'é necessario no minimo :min questões e no maximo :max questões!',
                'questions.max' => 'é necessario no minimo :min questões e no maximo :max questões!',
            ]
        );
    }
}
