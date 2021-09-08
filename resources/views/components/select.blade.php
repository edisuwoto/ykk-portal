@props(['disabled' => false])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded shadow-sm border-gray-500 focus:border-gray-500 focus:ring focus:ring-gray-200 focus:ring-opacity-50']) !!}>
    {{ $slot }}
</select>
