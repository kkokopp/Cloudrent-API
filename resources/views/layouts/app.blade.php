<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        {{-- Image upload Preview --}}
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
        {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
        {{-- <link rel="stylesheet" href="{{ asset('resources/css/app.css') }}"> --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        {{-- <link rel="stylesheet" href="{{ mix('assets/app-19dc48f2.css') }}">
        <script src="{{ mix('assets/app-8dbc3f53.js') }}"></script> --}}

        {{-- <link rel="stylesheet" href="{{ assets('build/assets/css/app-19dc48f2.css') }}"> --}}
        {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
        {{-- <script src="{{ asset('resources/app.js') }}"></script> --}}


        <!-- Styles -->
        @livewireStyles
    </head>
</head>
<body class="font-sans antialiased">
    
    <div class="min-h-screen bg-gray-100">
        

        {{-- @livewire('navigation-menu') --}}

        <!-- Page Heading -->
        
        <!-- Page Content -->
        <div class="flex flex-col">
            @livewire('sidebar')
        </div>

        <div class="min-h-screen flex flex-col lg:ml-64">
            <x-banner/>
            @if (isset($header))
                <header class="bg-white shadow flex">
                    <button data-drawer-toggle="logo-sidebar" data-drawer-target="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                           <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                        </svg>
                    </button>
                    <div class="max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif
            {{-- <div class="flex"> --}}
            <main>
                {{ $slot }}
            </main>
        </div>

        {{-- </div> --}}
    </div>

    {{-- @stack('modals') --}}

    {{-- @livewire('livewire-ui-modal') --}}

    @livewireScripts
</body>
<script src="{{ asset('js/image.js') }}"></script>
</html>
