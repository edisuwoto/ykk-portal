<nav>
    <!-- Primary Navigation Menu -->
    <div class="h-12 w-full bg-gradient-to-b from-blue-400 via-blue-800 to-blue-400 px-4 py-1 flex items-center justify-between shadow-lg">
        <!-- Logo -->
        <div class="flex justify-start items-center">
            <div class="flex items-center">
                <a class="hidden md:block" href="{{ route('dashboard') }}">
                    <span class="inline-flex items-center font-black text-white">PT YKK ZIPPER</span>
                </a>
                <span class="md:ml-32 inline-flex rounded-md">
                    <button type="button" x-on:click="sidebar = !sidebar" class="inline-flex items-center text-2xl hover:text-gray-200 focus:text-white focus:outline-none transition duration-150 ease-in-out">
                        <i class="fas fa-bars object-cover"></i>
                    </button>
                </span>
            </div>
        </div>
        <!-- Logout -->
        <div class="flex justify-end items-center space-x-3">
            <div>
                <x-dropdown width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center  border-2 border-transparent rounded-lg hover:border-gray-200 focus:outline-none focus:border-gray-300 focus:shadow-inner transition duration-150 ease-in-out">
                            <i class="fas fa-language text-white text-3xl"></i>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        @foreach (array_filter(scandir(base_path().'/resources/lang/'), function($item){ return !(strpos($item, '.') !== false) && strlen($item) <= 2; }) as $lang)
                            <x-dropdown-link :href="route('lang.change', ['lang' => $lang])">
                                {{ strtoupper($lang) }}
                            </x-dropdown-link>
                        @endforeach
                    </x-slot>
                </x-dropdown>
            </div>
            <div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="inline-flex rounded-md">
                        <button class="group pr-4 inline-flex items-center space-x-2 border-2 border-transparent rounded-full hover:border-gray-200 focus:outline-none focus:border-gray-300 focus:shadow-inner transition duration-150 ease-in-out">
                            <img class="h-8 w-8 rounded-full object-cover" src="{{ auth()->user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" onerror="this.onerror=null; this.src='{{asset('storage/img/app/user.png')}}'" />
                            <span class="text-white text-sm">{{ __('button.log_out') }}</span>
                        </button>
                    </a>
                </form>
            </div>
        </div>
    </div>
</nav>
