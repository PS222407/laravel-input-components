<?php

namespace Jensramakers\LaravelInputComponents\app\View\Components;

use Illuminate\View\Component;

class InputTextarea extends Component
{
    public function __construct(
        public string $name,
        public string $label,
        public string $type = 'textarea',
        public string $classParent = '',
        public string $styleParent = '',
        public $form = null,
        public $attr = null,
        public bool $required = true,
        public $default = null,
        public string $help = '',
    ) {
    }

    public function render()
    {
        return view('laravel-input-components::input-textarea');
    }
}
