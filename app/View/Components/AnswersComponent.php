<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AnswersComponent extends Component
{
    public array $answer;
    public function __construct($answer)
    {
        $this->answer = $answer;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.answers-component');
    }
}
