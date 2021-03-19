<?php

namespace App\View\Components;

use Illuminate\View\Component;

class WriteOptions extends Component
{
    public $woData;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($woData)
    {
        $this->woData = $woData;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.write-options');
    }
}
