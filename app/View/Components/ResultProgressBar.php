<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ResultProgressBar extends Component
{
    public $title;
    public $results;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $results)
    {
        $this->title = $title;
        $this->results = $results;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.result-progress-bar');
    }
}
