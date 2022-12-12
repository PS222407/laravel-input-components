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
    <input type="checkbox" name="{{ $name }}" id="{{ $name }}" {{ $form ? 'form='.$form : '' }} {{ $attr }} {{ $required ? 'required' : '' }} @if((!old() && $default) || old($name) == 'on') checked="checked" @endif class="w-4 h-4 text-input_color bg-gray-100 rounded border-gray-300 focus:ring-input_color focus:ring-2">
    <label for="{{ $name }}" class="ml-1 text-sm dark:text-white font-medium">
        {{ $label }} @if($required) <span style="color: red">*</span> @endif
    </label>
</div>
