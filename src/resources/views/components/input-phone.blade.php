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
    <label for="{{ $name }}" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] @if($placeholder === ' ') peer-focus:left-0 peer-focus:text-gray-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 @endif">
        {{ $label }} @if($required) <span style="color: red">*</span> @endif
    </label>
    <input id="phone" type="{{ $type }}" name="{{ $name }}" value="{{ old($name) ?? $default }}" {{ $form ? 'form='.$form : '' }} {{ $attr }} class="{{ $class }} @error($name) grow w-full shadow appearance-none border-red-500 @enderror phone block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-input_color peer" style="{{ $style }}">
    <input type="hidden" name="phone_number_region" id="phone_number_region" />
    <input type="hidden" id="defaultPhoneCountryRegion" value="{{ old('phone_number_region') ?? $defaultPhoneRegion }}">
    <span id="valid-msg" class="hidden text-lime-500">✓ Valid</span>
    <span id="error-msg" class="hidden text-red-500"></span>
</div>
