@if($help)
    <div data-popover id="popover-description-{{ $name }}" role="tooltip" class="w-fit inline-block absolute invisible z-10 bg-white rounded-lg border border-gray-200 shadow-sm opacity-0 transition-opacity duration-300">
        <div class="p-3 space-y-2 text-sm">
            {!! $help !!}
        </div>
        <div data-popper-arrow></div>
    </div>
    <p class="flex items-center gap-x-2 text-xs mb-1">
        <span>{{ __('admin.more_info') }}</span>
        <button data-popover-target="popover-description-{{ $name }}" data-popover-placement="top" type="button">
            <i class="fa-solid fa-question-circle"></i>
        </button>
    </p>
@endif
<div class="relative {{ !in_array($type, ['country', 'tel']) ? 'z-0' : '' }} mb-6 {{ $type == 'checkbox' ? 'min-w-max' : '' }} w-full group {{ $classParent }}" style="{{ $styleParent }}">
    @if($labelVisibility)
        <label for="{{ $name }}" class="text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-gray-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
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
                    } elseif (old($name) === null && in_array($option['id'], ($default == null ? [] : $default))) {
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
