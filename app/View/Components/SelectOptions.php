<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SelectOptions extends Component
{
    public $soData;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($soData)
    {
        $this->soData = $soData;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.select-options');
    }
}
