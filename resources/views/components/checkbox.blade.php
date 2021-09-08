@props(['checked' => false])

<input type="checkbox" {{$checked ? 'checked' : ''}} {!! $attributes->merge(['class' => 'border border-gray-400 text-gray-500 shadow-sm rounded-md hover:bg-gray-50 hover:border-gray-200 focus:border-gray-500 focus:ring focus:ring-gray-500 cursor-pointer transition duration-150 ease-in-out']) !!}>
