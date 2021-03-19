<?php

namespace App\View\Components;

use Illuminate\View\Component;

class OrdenarFragmentos extends Component
{
    public $ofData;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($ofData)
    {
        $this->ofData = $ofData;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.ordenar-fragmentos');
    }
}
