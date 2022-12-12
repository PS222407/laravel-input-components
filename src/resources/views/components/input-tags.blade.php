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
    @if($labelVisibility)
        <label for="{{ $name }}" class="text-sm dark:text-white text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-gray-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
            {{ $label }} @if($required) <span style="color: red">*</span> @endif
        </label>
    @endif
    <select name="{{ $name }}[]" id="{{ $name }}" {{ $form ? 'form='.$form : '' }} {{ $attr }} @if($required) required @endif multiple="multiple" class="tag-multiple-creation-delimeter-comma-space block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-input_color peer">
        @php
            $settedOptions = [];
        @endphp
        @foreach($options as $option)
            @if (!array_key_exists($lang, $option['name']))
                {{-- skip --}}
            @else
                @php
                    $isSelected = false;
                    if (old($name) == $option[$optionValue]) {
                        $isSelected = true;
                    } elseif (old($name) && in_array($option['name'][$lang], old($name))) {
                        $isSelected = true;
                    } elseif (!old() && in_array($option['id'], ($default == null ? [] : $default))) {
                        $isSelected = true;
                    }
                @endphp
                <option value="{{ $option['name'][$lang] }}" @if($isSelected) selected="selected" @endif>
                    {{ $option['name'][$lang] }}
                </option>
                {{ $settedOptions[] = $option['name'][$lang] }}
            @endif
        @endforeach
        @if (old($name))
            @foreach (old($name) as $option)
                @if (!in_array($option, $settedOptions))
                    <option value="{{ $option }}" @if(in_array($option, old($name))) selected="selected" @endif>{{ $option }}</option>
                @endif
            @endforeach
        @endif
    </select>
</div>

<span id="input_color" hidden style="display: none" class="bg-input_color"></span>
<span id="background_color" hidden style="display: none" class="bg-background-dark"></span>
<div class="setStyle"></div>
<div class="setDarkStyle"></div>
<script defer>
    function setSelectDarkMode() {
        let color1 = window.getComputedStyle(document.getElementById('background_color')).getPropertyValue('background-color');
        let els = document.querySelectorAll('.select2-selection.select2-selection--multiple');
        for (let i = 0; i < els.length; i++) {
            els[i].style.backgroundColor = color1;
            els[i].style.borderColor = 'black';
        }

        document.querySelector('.setDarkStyle').innerHTML = `
        <style>
            .select2-selection.select2-selection--single {
                background: ${color1} !important;
                border-color: black;
            }
            .option-search-array .select2-selection__rendered {
                color: white !important;
            }
            .select2-search__field {
                background-color: ${color1};
                border-color: black !important;
                color: white;
            }
            .select2-search--dropdown .select2-search__field:focus {
                box-shadow: none;
                border: solid 1px ${color} !important;
            }
            .select2-search.select2-search--dropdown {
                background-color: black;
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
    document.querySelector('.setStyle').innerHTML = `
        <style>
            .select2-container--default .select2-results__option--highlighted.select2-results__option--selectable {
                background-color: ${color};
            }
        </style>
    `;
</script>
