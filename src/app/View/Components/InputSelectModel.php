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
        public $form = null,
        public bool $required = true,
        public $default = null,
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
