<?php

namespace Jensramakers\LaravelInputComponents\app\View\Components;

use Illuminate\View\Component;

class InputPhone extends Component
{
    public function __construct(
        public string $name,
        public string $label,
        public string $type = 'tel',
        public string $classParent = '',
        public string $styleParent = '',
        public bool $required = true,
        public $default = null,
        public $form = null,
        public $attr = null,
        public string $class = '',
        public string $style = '',
        public string $placeholder = ' ',
        public string $help = '',
        public string $defaultPhoneRegion = 'nl',
    ) {
    }

    public function render()
    {
        return view('laravel-input-components::input-phone');
    }
}
