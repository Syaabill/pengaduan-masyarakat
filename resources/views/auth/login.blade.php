<x-guest-layout>
    <x-auth-card>
        
        <x-slot name="logo">
            <a href="/">
                <img class="w-20 h-20" src="{{ asset('img/logo.svg')}} " alt="Logo">
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" class="dark:text-gray-300" />

                <x-input id="email" class="block mt-1 w-full dark:bg-gray-800 dark:border-gray-700 dark:text-gray-300" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div>
                <x-label for="password" :value="__('Password')" class="dark:text-gray-300" />

                <x-input id="password" class="block mt-1 w-full dark:bg-gray-800 dark:border-gray-700 dark:text-gray-300"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 dark:border-gray-600 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-800 dark:ring-offset-gray-900" name="remember">
                <label for="remember_me" class="ml-2 text-sm text-gray-600 dark:text-gray-300">{{ __('Ingat Saya') }}</label>
            </div>

            <div class="flex items-center justify-between">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white" href="{{ route('password.request') }}">
                        {{ __('Lupa kata sandi Anda?') }}
                    </a>
                @endif

                <x-button class="ml-3 bg-blue-500 text-white font-bold rounded-md py-2 px-4 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:bg-blue-600 dark:bg-blue-700 dark:hover:bg-blue-800 hover:scale-105 duration-300 ease-in-out">
                    {{ __('Login') }}
                </x-button>
            </div>

            <div class="mt-4 text-center">
                <p class="text-sm text-gray-600 dark:text-gray-300">
                    {{ __("Don't have an account yet") }}
                    <a href="{{ route('register') }}" class="underline text-blue-600 dark:text-blue-400 hover:text-blue-900 dark:hover:text-blue-500">
                        {{ __('Create an account first') }}
                    </a>
                </p>
            </div>
        </form>
        
    </x-auth-card>
</x-guest-layout>

<!-- Tailwind CSS Dark Mode Toggle Script -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const themeToggle = document.getElementById('theme-toggle');
        const htmlElement = document.documentElement;
        
        themeToggle.addEventListener('click', () => {
            if (htmlElement.classList.contains('dark')) {
                htmlElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            } else {
                htmlElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            }
        });

        if (localStorage.getItem('theme') === 'dark') {
            htmlElement.classList.add('dark');
        }
    });
</script>

<button id="theme-toggle" class="fixed bottom-4 right-4 p-2 bg-gray-200 dark:bg-gray-700 rounded-full shadow-lg focus:outline-none">
    <svg id="theme-icon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-800 dark:text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path d="M12 3v1m0 16v1m8.66-12.34l-.71.71M6.34 18.34l-.71.71m12.02 0l-.71-.71M6.34 5.66l-.71-.71M21 12h-1M4 12H3m16.95 6.36A9 9 0 118.65 2.05a9 9 0 0110.31 16.31z" />
    </svg>
</button>
