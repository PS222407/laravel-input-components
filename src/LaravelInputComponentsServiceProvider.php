<?php

namespace Jensramakers\LaravelInputComponents;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Jensramakers\LaravelInputComponents\app\View\Components\InputCheckbox;
use Jensramakers\LaravelInputComponents\app\View\Components\InputCKEditor;
use Jensramakers\LaravelInputComponents\app\View\Components\InputCountry;
use Jensramakers\LaravelInputComponents\app\View\Components\InputPhone;
use Jensramakers\LaravelInputComponents\app\View\Components\InputSelectArray;
use Jensramakers\LaravelInputComponents\app\View\Components\InputSelectModel;
use Jensramakers\LaravelInputComponents\app\View\Components\InputSelectMultiple;
use Jensramakers\LaravelInputComponents\app\View\Components\InputTags;
use Jensramakers\LaravelInputComponents\app\View\Components\InputText;
use Jensramakers\LaravelInputComponents\app\View\Components\InputTextarea;

class LaravelInputComponentsServiceProvider extends ServiceProvider
{
    public function register()
    {
    }

    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/resources/views/components', 'laravel-input-components');

        $this->publishes([
            __DIR__.'/../lang' => $this->app->langPath('vendor/jensramakers'),
        ]);

        Blade::component(InputText::class, 'input-text');
        Blade::component(InputCheckbox::class, 'input-checkbox');
        Blade::component(InputSelectArray::class, 'input-select-array');
        Blade::component(InputSelectModel::class, 'input-select-model');
        Blade::component(InputSelectMultiple::class, 'input-select-multiple');
        Blade::component(InputTextarea::class, 'input-textarea');
        Blade::component(InputTags::class, 'input-tags');
        Blade::component(InputCountry::class, 'input-country');
        Blade::component(InputPhone::class, 'input-phone');
        Blade::component(InputCKEditor::class, 'input-ckeditor');
    }
}
