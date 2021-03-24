<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Caligrama extends Component
{
    public $caligramaData;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($caligramaData)
    {
        $this->caligramaData = $caligramaData;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.caligrama');
    }
}
