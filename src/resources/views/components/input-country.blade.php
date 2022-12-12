@if($help)
    <div data-popover id="popover-description-{{ $name }}" role="tooltip" class="w-fit inline-block absolute invisible z-10 bg-white rounded-lg border border-gray-200 shadow-sm opacity-0 transition-opacity duration-300">
        <div class="p-3 space-y-2 text-sm">
            {!! $help !!}
        </div>
        <div data-popper-arrow></div>
    </div>
    <p class="flex items-center gap-x-2 text-xs mb-1 dark:text-white">
        <span>{{ __('admin.more_info') }}</span>
        <button data-popover-target="popover-description-{{ $name }}" data-popover-placement="top" type="button">
            <i class="fa-solid fa-question-circle"></i>
        </button>
    </p>
@endif
<div class="relative {{ !in_array($type, ['country', 'tel']) ? 'z-0' : '' }} mb-6 {{ $type == 'checkbox' ? 'min-w-max' : '' }} w-full group {{ $classParent }}" style="{{ $styleParent }}">
    <div>
        <label for="{{ $name }}" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] @if($placeholder === ' ') peer-focus:left-0 peer-focus:text-gray-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 @endif">
            {{ $label }} @if($required) <span style="color: red">*</span> @endif
        </label>
        <input type="text" name="{{ $name }}" id="{{ $name }}" {{ $form ? 'form='.$form : '' }} {{ $attr }} @if($required) required @endif placeholder="{{ $placeholder }}" @if(old($name) != '') value="{{ old($name) }}" @else value="{{ $default }}" @endif class="{{ $class }} @error($name) shadow appearance-none border-red-500 @enderror country-input block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-input_color peer">
        <input type="hidden" id="{{ $name }}_code" name="{{ $name }}_code">
    </div>
</div>

<span id="input_color" hidden style="display: none" class="bg-input_color"></span>
<span id="background_color" hidden style="display: none" class="bg-background-dark"></span>
<div class="setDarkStyleCountry"></div>
<script defer>
    function setSelectDarkModeCountry() {
        let color1 = window.getComputedStyle(document.getElementById('background_color')).getPropertyValue('background-color');
        let color = window.getComputedStyle(document.getElementById('input_color')).getPropertyValue('background-color');

        document.querySelector('.setDarkStyleCountry').innerHTML = `
        <style>
            .country-input {
                background-color: ${color1};
                color: white;
            }
            .country-list {
                background-color: ${color1} !important;
                color: white;
            }
            .country-list .country.highlight{
                background-color: ${color} !important;
            }
        </style>
    `;
    }
</script>
