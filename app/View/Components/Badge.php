<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Badge extends Component
{
        /**
     * The alert type.
     *
     * @var string
     */
    public $type;

    /**
     * The alert message.
     *
     * @var string
     */
    public $message;
    public $show;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type, $message, $show)
    {
        $this->type = $type;
        $this->message = $message;
        $this->show = $show;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.badge');
    }
}
