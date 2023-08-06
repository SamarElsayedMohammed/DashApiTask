@props([
    'type' => 'text',
    'name',
    'value' => '',
    'label' => false,
    'id' => '',
    'labelName' => '',
    'labelClass' => '',
])

@if ($label)
    <x-dashboard.inputs.label labelClass={{ $labelClass }}
        for="{{ $id }}">{{ $labelName }}</x-form.label>
@endif

<input id="{{ $id }}" type="{{ $type }}" name="{{ $name }}"
    {{ $attributes->class(['form-control', 'is-invalid' => $errors->has($name)]) }}
    value="{{ old($name, $value) }}">

<x-dashboard.inputs.error-feedback :name="$name" />
