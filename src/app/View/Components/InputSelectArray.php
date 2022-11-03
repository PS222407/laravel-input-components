<?php

namespace Jensramakers\LaravelInputComponents\app\View\Components;

use Illuminate\View\Component;

class InputSelectArray extends Component
{
    public function __construct(
        public string $name,
        public string $label,
        public string $type = 'selectArray',
        public $form = null,
        public bool $required = true,
        public $default = null,
        public string $help = '',
        public array $options = [],
    ) {
    }

    public function render()
    {
        return view('laravel-input-components::input-select-array');
    }
}
