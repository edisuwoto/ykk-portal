@props(['customAttributes' => []])

<td {{ $attributes->merge(array_merge(['class' => ''], $customAttributes)) }}>
    {{ $slot }}
</td>
