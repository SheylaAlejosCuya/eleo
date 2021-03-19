<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormarPalabra extends Component
{
    public $word;
    public $answer;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($word, $answer)
    {
        $this->word = $word;
        $this->answer = $answer;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.formar-palabra');
    }
}
