<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AnswerDescription extends Component
{
    public $adData;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($adData)
    {
        $this->adData = $adData;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.answer-description');
    }
}
