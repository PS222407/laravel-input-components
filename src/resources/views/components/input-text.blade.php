@if($help)
    <div data-popover id="popover-description-{{ $name }}" role="tooltip" class="w-fit inline-block absolute invisible z-10 bg-white rounded-lg border border-gray-200 shadow-sm opacity-0 transition-opacity duration-300">
        <div class="p-3 space-y-2 text-sm">
            {!! $help !!}
        </div>
        <div data-popper-arrow></div>
    </div>
    <p class="flex items-center gap-x-2 text-xs mb-3 dark:text-white">
        <span>{{ __('admin.more_info') }}</span>
        <button data-popover-target="popover-description-{{ $name }}" data-popover-placement="top" type="button">
            <i class="fa-solid fa-question-circle"></i>
        </button>
    </p>
@endif
<div class="relative {{ !in_array($type, ['country', 'tel']) ? 'z-0' : '' }} mb-6 {{ $type == 'checkbox' ? 'min-w-max' : '' }} w-full group {{ $classParent }}" style="{{ $styleParent }}">
    <input {{ $attributes }} type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" {{ $form ? 'form='.$form : '' }} {{ $attr }} @if($steps != 0) step="{{ $steps }}" @endif @if($required) required @endif placeholder="{{ $placeholder }}" @if(old($name) != '') value="{{ old($name) }}" @else value="{{ $default }}" @endif @if($uppercase) oninput="this.value = this.value.toUpperCase()" @endif class="{{ $class }} @if($errors) @error($name) shadow appearance-none border-red-500 @enderror @endif rounded-t block py-2.5 px-0 pl-1 w-full text-sm text-gray-900 dark:text-white bg-transparent dark:bg-background-dark border-0 border-b-2 border-gray-300 dark:border-black appearance-none focus:outline-none focus:ring-0 focus:border-input_color focus:dark:border-input_color peer" style="{{ $style }}">
    <label for="{{ $name }}" class="absolute text-sm text-gray-500 dark:text-white dark:bg-background-dark px-1 rounded duration-300 transform -translate-y-6 scale-75 top-3 origin-[0] @if($placeholder === ' ') peer-focus:left-0 peer-focus:text-gray-500 dark:peer-focus:text-white peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 @endif">
        {{ $label }} @if($required) <span style="color: red">*</span> @endif
    </label>
</div>
