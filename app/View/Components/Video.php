<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Video extends Component
{
    public $continue;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($continue)
    {
        $this->continue = $continue;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.video');
    }
}
