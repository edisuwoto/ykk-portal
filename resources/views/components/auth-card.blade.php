<div class="min-h-screen flex flex-col justify-center items-center bg-gray-100">
    @if (isset($logo))
        <div class="mb-6">
            {{ $logo }}
        </div>
    @endif

    <div class="w-full sm:max-w-md px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
