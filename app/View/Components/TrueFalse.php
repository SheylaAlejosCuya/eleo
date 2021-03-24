<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TrueFalse extends Component
{
    public $tfData;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($tfData)
    {
        $this->tfData = $tfData;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.true-false');
    }
}
