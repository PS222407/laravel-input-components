<?php

namespace Jensramakers\LaravelInputComponents\app\View\Components;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class InputSelectModel extends Component
{
    public function __construct(
        public string $name,
        public string $label,
        public Collection $options,
        public string $optionLabel,
        public string $type = 'select',
//        public string $classParent = '    ',
//        public string $styleParent = '',
        public $form = null,
//        public $attr = null,
//        public float $steps = 0.0,
        public bool $required = true,
//        public string $placeholder = ' ',
        public $default = null,
//        public bool $uppercase = false,
//        public string $class = '',
//        public string $style = '',
        public string $help = '',
        public string $optionValue = 'id',
    ) {
    }

    public function render()
    {
        $options = $this->options->toArray();
        $optionsArray = array_combine(array_column($options, $this->optionValue), array_column($options, $this->optionLabel));

        return view('laravel-input-components::input-select-model', [
            'optionsArray' => $optionsArray,
        ]);
    }
}
