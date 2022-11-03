# Installation
## package
install package via composer
```bash
composer require jensramakers/laravel-input-components
```
publish country translations
```bash
php artisan vendor:publish --provider="Jensramakers\LaravelInputComponents\LaravelInputComponentsServiceProvider"
```

to change colors if the input fields use the input_color variable in tailwind.config.js
```js
module.exports = {
    theme: {
        extend: {
            colors: {
                "input_color": "yellow",
            },
        },
    },
};
```
## flowbite | help popover
to use the help info popover install flowbite  
https://flowbite.com/docs/getting-started/quickstart/

## select2 | dropdowns
to use the selects and tag input optimally install select2
```bash
npm i select2
```
import in javascript
```js
require('select2');
```
and import in css
```css
@import '~select2/dist/css/select2';
```
And add this javascript to make tag and select2 possible
```js
$(".tag-multiple-creation-delimeter-comma-space").select2({
    tags: true,
    tokenSeparators: [',', ' ']
})
$(".option-multiple").select2()

matchStart = function(params, data) {
    if ($.trim(params.term) === '') {
        return data;
    }
    if (typeof data.text === 'undefined') {
        return null;
    }
    if (data.text.toUpperCase().indexOf(params.term.toUpperCase()) > -1) {
        return $.extend({}, data, true);
    }

    return null;
}

$(".option-search").select2({
    matcher: matchStart
});
```
## Spatie-tags | tag input
the tag input only accepts tags from this package:  
https://spatie.be/docs/laravel-tags/v4/installation-and-setup

## Country selector
for country input install:
```bash
npm i country-select-js
```
import javascript
```js
require('country-select-js');

$(".country-input").countrySelect({
    defaultCountry: 'nl',
    preferredCountries: ['nl', 'be', 'de', 'lu'],
    responsiveDropdown: false,
});
```
and import css
```css
@import "~country-select-js/build/css/countrySelect.min.css";
```
## Phone input
for phone input install npm package:
```bash
npm i intl-tel-input
```
and use this piece of javascript code
```js
import intlTelInput from 'intl-tel-input';
require('intl-tel-input/build/js/utils')

let iti = null;
const initializePhoneNumberInput = function () {
    const input = document.querySelector("#phone"),
        errorMsg = document.querySelector("#error-msg"),
        validMsg = document.querySelector("#valid-msg");

    if (input) {
        // here, the index maps to the error code returned from getValidationError - see readme
        const errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];

        // initialise plugin
        iti = intlTelInput(input, {
            preferredCountries: ['nl', 'be', 'de', 'lu'],
            hiddenInput: "full",
            formatOnDisplay: false,
        });

        iti.setCountry($('#defaultPhoneCountryRegion').val().toLowerCase())

        const reset = function() {
            let el = document.getElementById('phone_number_region');
                el.value = iti.getSelectedCountryData().iso2;
                el.dispatchEvent(new Event('input'));

            input.classList.remove("error");
            errorMsg.innerHTML = "";
            errorMsg.classList.add("hidden");
            validMsg.classList.add("hidden");
        };

        // on blur: validate
        input.addEventListener('blur', function() {
            reset();
            if (input.value.trim()) {
                if (iti.isValidNumber()) {
                    validMsg.classList.remove("hidden");
                } else {
                    input.classList.add("error");
                    let errorCode = iti.getValidationError();
                    errorMsg.innerHTML = errorMap[errorCode];
                    errorMsg.classList.remove("hidden");
                }
            }
        });

        // on keyup / change flag: reset
        input.addEventListener('change', reset);
        input.addEventListener('keyup', reset);
        input.addEventListener("countrychange", reset);
    }
}
initializePhoneNumberInput();

window.addEventListener('reinitialize', () => {
    initializePhoneNumberInput();
});
```
import the css
```css
@import "~intl-tel-input";
```
IMPORTANT id "phone" is reserved  
IMPORTANT multiple phone inputs on 1 page will not work currently

## CKEditor
Put these 2 files below directly in public folder, they are already minified  

for ckeditor add this JS file  
https://drive.google.com/file/d/1ICjjAnDuqqJl7PwrdVAMcFuzH5TrhqJy/view?usp=share_link  
for ckeditor add this CSS file  
https://drive.google.com/file/d/14zMeVnjHwLLGBPigJuOXtT1XN8RDMZNt/view?usp=share_link  

and this piece of code
```js
document.querySelectorAll('.editor').forEach(function (item) {
    ClassicEditor.create(item, {
        licenseKey: '',
    })
    .then(newEditor => {
    newEditor.editing.view.change( writer => {
        writer.setStyle('min-width', '1000px', newEditor.editing.view.document.getRoot());
    } );
    })
    .catch(error => {
        console.error('Error CKEditor');
        console.error(error);
    });
})
```

# Usage
Here some examples of usages for these inputs
```php
<x-input-text name="name" label="name" help="jkl;adjfkl" default="jklsdjfdjk" :required="false" />
<x-input-checkbox name="checkbox" label="checkbox" help="jkl;adjfkl" :default="true" :required="false" />
<x-input-select-multiple name="multicordde" label="select multiple model" :options="Product::all()" :default="Product::whereIn('id', [5,2])->get()" :required="false" />
<x-input-select-multiple name="multicore" label="select multipelele array" :options="['jksdf',234,23]" :default="[0,2]" :required="false" />
<x-input-select-array name="selct_array_input" label="select array" :options="['jksdf',234,23]" :default="1" :required="false" />
<x-input-select-model name="laptop" label="laptop" option-label="name" :options="Product::all()" :default="11" :required="false" />
<x-input-textarea name="customtextarea" label="kald" :required="false" />
<x-input-tags name="tags" label="tags" :options="\Spatie\Tags\Tag::all()" :default="\Spatie\Tags\Tag::where('id', 1)->get()" option-label="name" :required="false" />
<x-input-tags name="laptops" label="tags" :options="\Spatie\Tags\Tag::all()" :default="\Spatie\Tags\Tag::where('id', 2)->get()" option-label="name" :required="false" />
<x-input-country name="country" label="land" :required="false" />
<x-input-country name="country2" label="land" default="Croatia (Hrvatska)" :required="false" />
<x-input-phone name="telefoonnummer" label="telefooooonnummer" />
<x-input-ckeditor name="bescrijving" label="descriptie" />
<x-input-ckeditor name="intro" label="intro" :required="false" />
```
