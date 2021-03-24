<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Pupiletras extends Component
{
    public $words;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($words)
    {
        $this->words = $words;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.pupiletras');
    }
}
