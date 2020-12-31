<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Video extends Component
{
    public $continue;
    public $lectura;
    public $alumno;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($continue, $lectura, $alumno)
    {
        $this->continue = $continue;
        $this->lectura = $lectura;
        $this->alumno = $alumno;
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
