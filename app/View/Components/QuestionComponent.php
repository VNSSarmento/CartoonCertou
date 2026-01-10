<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class QuestionComponent extends Component
{
    public int $totalQuestions;
    public string $question;
    public string $currentQuestion;
    public int $progress;

    public function __construct($totalQuestions, $question, $currentQuestion)
    {
        $this->totalQuestions = $totalQuestions;
        $this->question = $question;
        $this->currentQuestion = $currentQuestion;
        $this->progress = $totalQuestions > 0
            ? round((($currentQuestion + 1) / $totalQuestions) * 100)
            : 0;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.question-component');
    }
}
