<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CompletarOracion extends Component
{
    public $coData;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($coData)
    {
        $this->coData = $coData;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.completar-oracion');
    }
}
