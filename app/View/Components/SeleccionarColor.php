<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SeleccionarColor extends Component
{
    public $scData;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($scData)
    {
        $this->scData = $scData;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.seleccionar-color');
    }
}
