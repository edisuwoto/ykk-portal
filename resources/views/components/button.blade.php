@props(['disabled' => false, 'autofocus' => false, 'bgColor' => 'bg-blue-900', 'textColor' => 'text-white'])
<button
    {{ $attributes->merge(['type' => 'button', 'class' => 'px-4 py-2 '.$bgColor.' items-center border border-transparent focus:border-gray-900 rounded-md font-semibold text-sm '.$textColor.' text-center focus:outline-none focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150']) }}
    {{ $disabled ? 'disabled' : '' }}
    {{ $autofocus ? 'autofocus' : '' }}
    style="min-width: 3rem;">
    {{ $slot }}
</button>
