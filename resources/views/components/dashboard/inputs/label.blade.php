@props([
    'id' => '',
    'labelClass' => '',
])

<label class="{{ $labelClass }}" for="{{ $id }}">{{ $slot }}</label>
