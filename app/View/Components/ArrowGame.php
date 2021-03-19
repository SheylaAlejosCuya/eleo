<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ArrowGame extends Component
{
    public $agData;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($agData)
    {
        $this->agData = $agData;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.arrow-game');
    }
}
