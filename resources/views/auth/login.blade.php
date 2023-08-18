<x-guest-layout>
    <div class="w-full h-screen flex items-center overflow-hidden">
        <div class="h-full hidden xl:w-1/2 xl:flex xl:flex-col bg-birtu items-center justify-center p-20">
            <img src="{{ asset('images/login.png') }}" alt="">
        </div>
        <div class="h-full w-full xl:w-1/2 bg-white justify-center items-center">
            <x-authentication-card>
                <h2 class="mb-12 text-4xl text-center font-extrabold tracking-tight leading-none text-birtu md:text-5xl lg:text-6xl">Login Admin</h2>
                {{-- <x-slot name="logo"> --}}
                                                {{-- <h1 class="text-white font-bold text-4xl p-4">Selamat Datang</h1>
                                                <h2 class="text-white text-xl">Dashboard CloudRent</h2> --}}
                    {{-- <img src="{{ asset('images/logo.jpg') }}" alt=""> --}}
                                                {{-- <x-authentication-card-logo /> --}}
                {{-- </x-slot> --}}
                <x-validation-errors class="mb-4" />
                                    
                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif
                                    
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                                    
                    <div>
                        <x-label for="name" value="{{ __('Username') }}" />
                        <x-input id="name" class="block mt-1 w-full" type="text" name="identity" :value="old('name')" required autofocus autocomplete="username" />
                    </div>
        
                    <div class="mt-4">
                        <x-label for="password" value="{{ __('Password') }}" />
                        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                    </div>
        
                    <div class="block mt-4">
                        <label for="remember_me" class="flex items-center">
                            <x-checkbox id="remember_me" name="remember" />
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>
        
                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
        
                        <x-button class="ml-4">
                            {{ __('Log in') }}
                        </x-button>
                    </div>
                </form>
            </x-authentication-card>
        </div>
    </div>
</x-guest-layout>
