# Installation
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
to use the help info popover install flowbite  
https://flowbite.com/docs/getting-started/quickstart/


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
the tag input only accepts tags from this package:  
https://spatie.be/docs/laravel-tags/v4/installation-and-setup

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
