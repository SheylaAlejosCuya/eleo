<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Acrostico extends Component
{
    public $acrosticoData;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($acrosticoData)
    {
        $this->acrosticoData = $acrosticoData;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.acrostico');
    }
}
