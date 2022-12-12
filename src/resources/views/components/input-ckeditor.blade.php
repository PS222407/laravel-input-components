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
<div class="mb-6">
    <label for="{{ $name }}" class="dark:text-white">{{ $label }} @if($required) <span style="color: red">*</span> @endif</label>
    <div class="row row-editor overflow-x-auto">
        <div>
            <textarea @if($required) required @endif name="{{ $name }}" @if($form) form="{{ $form }}" @endif class="editor" id="{{ $name }}">
                {!! old($name) ?? $default !!}
            </textarea>
        </div>
    </div>
</div>
