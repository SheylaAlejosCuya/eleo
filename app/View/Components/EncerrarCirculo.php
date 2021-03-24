<?php

namespace App\View\Components;

use Illuminate\View\Component;

class EncerrarCirculo extends Component
{
    public $ecData;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($ecData)
    {
        $this->ecData = $ecData;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.encerrar-circulo');
    }
}
