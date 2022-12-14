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
<div class="relative z-0 mb-6 w-full group">
    <label for="{{ $name }}" class="dark:text-white">{{ $label }}{!! $required ? ' <span style="color: red">*</span>' : '' !!}</label>
    <select multiple {{ $form ? 'form='.$form : '' }} name="{{ $name }}[]" id="{{ $name }}" {{ $required ? 'required' : '' }} class="option-search" style="width: 100%">
        @foreach($options as $key => $option)
            <option @if(old($name) !== null && in_array($key, old($name))) selected="selected" @elseif(!old() && in_array($key, $default ?? [])) selected="selected" @else  @endif value="{{ $key }}">{{ $option }}</option>
        @endforeach
    </select>
</div>

<span id="input_color" hidden style="display: none" class="bg-input_color"></span>
<span id="background_color" hidden style="display: none" class="bg-background-dark"></span>
<div class="setStyleSelectMultiple"></div>
<div class="setDarkStyleSelectMultiple"></div>
<script defer>
    function setSelectDarkModeSelectMultiple() {
        let color1 = window.getComputedStyle(document.getElementById('background_color')).getPropertyValue('background-color');
        let els = document.querySelectorAll('.select2-selection.select2-selection--multiple');
        for (let i = 0; i < els.length; i++) {
            els[i].style.backgroundColor = color1;
            els[i].style.borderColor = 'black';
        }

        document.querySelector('.setDarkStyleSelectMultiple').innerHTML = `
        <style>
            .option-search .select2-results__options {
                background-color: ${color1};
                color: white;
            }
            .select2-results__options {
                background-color: ${color1};
                color: white;
            }
            .select2-container--default .select2-results__option--selected {
                background-color: black;
            }
            .select2-dropdown--below {
                border-color: black;
            }
        </style>
    `;
    }

    color = window.getComputedStyle(document.getElementById('input_color')).getPropertyValue('background-color');
    document.querySelector('.setStyleSelectMultiple').innerHTML = `
        <style>
            .select2-container--default .select2-results__option--highlighted.select2-results__option--selectable {
                background-color: ${color};
            }
        </style>
    `;
</script>
