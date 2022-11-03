<?php

namespace Jensramakers\LaravelInputComponents\app\View\Components;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class InputSelectMultiple extends Component
{
    public function __construct(
        public string $name,
        public string $label,
        public string $type = 'selectMultiple',
        public $form = null,
        public bool $required = true,
        public $default = null,
        public string $help = '',
        public $options = [],
        public $optionValue = 'id',
        public $optionLabel = 'name',
    ) {
        if (is_object($this->options)) {
            $this->options = array_combine($this->options->pluck($this->optionValue)->toArray(), $this->options->pluck($this->optionLabel)->toArray());
        }
        if (is_object($this->default)) {
            $this->default = $this->default->pluck($this->optionValue)->toArray();
        }
    }

    public function render()
    {
        return view('laravel-input-components::input-select-multiple');
    }
}
