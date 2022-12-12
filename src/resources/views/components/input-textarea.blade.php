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
    <label for="{{ $name }}" class="text-sm text-gray-500 duration-300 transform -translate-y-6 dark:text-white scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-gray-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
        {{ $label }} @if($required) <span style="color: red">*</span> @endif
    </label>
    <textarea name="{{ $name }}" id="{{ $name }}" {{ $form ? 'form='.$form : '' }} {{ $attr }} @if($required) required @endif cols="30" rows="10" class="dark:text-white dark:bg-background-dark rounded block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-1 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-input_color peer">{{ old($name) ?? $default }}</textarea>
</div>
