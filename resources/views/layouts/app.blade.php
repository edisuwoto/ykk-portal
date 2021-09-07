<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @livewireStyles
        @stack('styles')

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased bg-gray-300">

        <div x-data="{ sidebar : $persist(false).as('sidebar-memory') }">
            <div class="fixed w-full top-0 z-20">
                @include('layouts.navigation')
            </div>

            <div x-show="sidebar"
                style="display: none;">
                <div class="fixed h-full w-full md:w-64 top-0 left-0 mt-12 bg-gray-100 md:border-r-2 border-blue-500 overflow-y-hidden">
                    <div class="m-1">
                        <div class="bg-gradient-to-b from-gray-100 to-gray-300 border border-gray-300 shadow">
                            <div class="p-2 text-sm">
                                {{ __('messages.welcome') }}, <span class="font-bold">{{ auth()->user()->name }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div x-bind:class="{ 'md:ml-64' : sidebar }" class="mt-12 mb-6">
                <!-- Page Heading -->
                @if (isset($header) || isset($headerTools))
                    <header class="bg-gradient-to-b from-gray-100 to-gray-300 border border-gray-300 shadow">
                        <div class="max-w-7xl mx-auto py-3 px-2 sm:px-6 lg:px-8">
                            <div class="flex items-center justify-between">
                                <div>
                                    {{ $header ?? '' }}
                                </div>
                                <div>
                                    {{ $headerTools ?? '' }}
                                </div>
                            </div>
                        </div>
                    </header>
                @endif

                <!-- Page Content -->
                <main class="container mx-auto">
                    {{ $slot }}
                </main>
            </div>

            <div class="fixed w-full bottom-0 z-20">
                <footer x-bind:class="{ 'md:ml-64' : sidebar }" x-data="clockConfig()" x-init="startClock">
                    <div class="m-1 px-4 py-1 bg-gray-100 border border-gray-400 shadow-lg">
                        <div class="grid grid-cols-2">
                            <div>
                                <div class="flex items-center justify-start text-sm">
                                    <span class="font-bold">YKK ZIPPER</span>&copy;<span>2021</span>
                                </div>
                            </div>
                            <div>
                                <div class="flex items-center justify-end text-sm">
                                    <span x-text="clock"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        @livewireScripts
        @stack('scripts')
        <script>
            function clockConfig() {
                return {
                    serverTime: new Date({{ time()*1000 }} ),
                    clock : '',
                    startClock: function(){
                        const self = this;

                        function updateClock() {
                            var days = [''];
                            var nowMS = self.serverTime.getTime();
                            nowMS += 1000;
                            var clock = new Date(self.serverTime.setTime(nowMS));
                            self.clock = clock.getDate()+" "+clock.toLocaleString('default', {month: 'long'})+" "+clock.getFullYear()+" "+(clock.getHours() < 10 ? '0' : '')+clock.getHours()+":"+(clock.getMinutes() < 10 ? '0' : '')+clock.getMinutes()+":"+(clock.getSeconds() < 10 ? '0' : '')+clock.getSeconds();
                        }

                        setInterval(() => {
                            updateClock();
                        }, 1000);
                    },
                }
            }
        </script>
    </body>
</html>
