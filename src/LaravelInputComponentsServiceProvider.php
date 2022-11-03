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
        // to use the help info popover install flowbite
        // https://flowbite.com/docs/getting-started/quickstart/

        // to use the selects and tag input optimally install select2
        // npm i select2
        // require('select2');
        // the tag input only accepts tags from this package:
        // https://spatie.be/docs/laravel-tags/v4/installation-and-setup

//        $(".tag-multiple-creation-delimeter-comma-space").select2({
//            tags: true,
//            tokenSeparators: [',', ' ']
//        })
//        $(".option-multiple").select2()
//
//        matchStart = function(params, data) {
//            if ($.trim(params.term) === '') {
//                return data;
//            }
//            if (typeof data.text === 'undefined') {
//                return null;
//            }
//            if (data.text.toUpperCase().indexOf(params.term.toUpperCase()) > -1) {
//                return $.extend({}, data, true);
//            }
//
//            return null;
//        }
//
//        $(".option-search").select2({
//            matcher: matchStart
//        });

//        for country input install:
//        npm i country-select-js
//        require('country-select-js');
//        @import "~country-select-js/build/css/countrySelect.min.css";

//        for phone input install npm package:
//        npm i intl-tel-input
//        and use this piece of javascript code
        // add phonenumber.js
//        add to css
//        @import "~intl-tel-input";
        // IMPORTANT id "phone" is reserved
        // IMPORTANT multiple phone inputs on 1 page will not work currently

        // for ckeditor add this js file
        // for ckeditor add this css file
        // and this piece of code
//        document.querySelectorAll('.editor').forEach(function (item) {
//        ClassicEditor.create(item, {
//                    licenseKey: '',
//                })
//                .then(newEditor => {
//                newEditor.editing.view.change( writer => {
//                    writer.setStyle('min-width', '1000px', newEditor.editing.view.document.getRoot());
//                } );
//                })
//                .catch(error => {
//                console.error('Error CKEditor');
//                console.error(error);
//            });
//        })
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
