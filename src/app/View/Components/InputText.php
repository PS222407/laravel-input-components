<?php

namespace Jensramakers\LaravelInputComponents\app\View\Components;

use Illuminate\View\Component;

class InputText extends Component
{
    public function __construct(
        public string $name,
        public string $label,
        public string $type = 'text',
        public string $classParent = '',
        public string $styleParent = '',
        public $form = null,
        public $attr = null,
        public float $steps = 0.0,
        public bool $required = true,
        public string $placeholder = ' ',
        public $default = null,
        public bool $uppercase = false,
        public string $class = '',
        public string $style = '',
        public string $help = '',
    ) {
    }

    public function render()
    {
        return view('laravel-input-components::input-text');
    }
}
