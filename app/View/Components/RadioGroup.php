<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RadioGroup extends Component
{
    /**
     * Create a new component instance.
     */

     //specify properties of the class, attributes of the component
    public function __construct(
        public string $name,
        public array $options
    )
    {
        //
    }

    public function  optionsWithLabels(): array
    {
        //check if the array s associative, if not the  with array combine generates an associative array
        return array_is_list($this->options) ? array_combine(array_map('ucfirst',$this->options), $this->options) : $this->options;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.radio-group');
    }
}
