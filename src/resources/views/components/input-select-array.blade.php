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
<div class="relative z-0 mb-6 w-full group">
    <label for="{{ $name }}">{{ $label }}{!! $required ? ' <span style="color: red">*</span>' : '' !!}</label>
    <select {{ $form ? 'form='.$form : '' }} name="{{ $name }}" id="{{ $name }}" {{ $required ? 'required' : '' }} class="option-search" style="width: 100%">
        <option value="" selected="selected">--- select option ---</option>
        @foreach($options as $key => $option)
            <option @if(old($name) !== null && old($name) == $key) selected="selected" @elseif($key === $default) selected="selected" @else  @endif value="{{ $key }}">{{ $option }}</option>
        @endforeach
    </select>
</div>

<span id="input_color" hidden style="display: none" class="bg-input_color"></span>
<div class="setStyle"></div>
<script defer>
    color = window.getComputedStyle(document.getElementById('input_color')).getPropertyValue('background-color');
    document.querySelector('.setStyle').innerHTML = `
        <style>
            .select2-container--default .select2-results__option--highlighted.select2-results__option--selectable {
                background-color: ${color};
            }
        </style>
    `;
</script>
