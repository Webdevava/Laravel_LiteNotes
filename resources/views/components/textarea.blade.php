@props(['disabled' => false, 'field' => '', 'value' => ''])

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm',
]) !!}>{{ $value }}</textarea>
@error($field)
    <p class="text-sm text-red-500 my-2">{{ $message }}</p>
@enderror
