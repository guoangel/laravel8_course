<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Updated extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $slot;
    public $date;
    public $name;
    public function __construct($date, $slot, $name)
    {
        $this->date = $date;
        $this->slot = $slot;
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.updated');
    }
}
