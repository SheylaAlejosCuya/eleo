<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DragDrop extends Component
{
    public $ddData;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($ddData)
    {
        $this->ddData = $ddData;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.drag-drop');
    }
}
