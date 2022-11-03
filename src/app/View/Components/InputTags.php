<?php

namespace Jensramakers\LaravelInputComponents\app\View\Components;

use Illuminate\Support\Facades\App;
use Illuminate\View\Component;

class InputTags extends Component
{
    public function __construct(
        public string $name,
        public string $label,
        public $options,
        public $lang = null,
        public string $type = 'tag',
        public string $classParent = '',
        public string $styleParent = '',
        public $form = null,
        public $attr = null,
        public $optionLabel = 'id',
        public $optionValue = 'id',
        public bool $required = true,
        public $default = null,
        public string $help = '',
        public bool $labelVisibility = true,
    ) {
        $this->lang = $lang ?? App::currentLocale();
        $this->options = $this->options->toArray();
        $this->default = $this->default->pluck('id')->toArray();
    }

    public function render()
    {
        return view('laravel-input-components::input-tags');
    }
}
