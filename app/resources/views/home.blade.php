<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <script>

    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-200 antialiased">

    <div class="min-h-screen flex flex-col">
        <header class="bg-white dark:bg-gray-800 shadow-sm z-20 border-b border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between h-16 px-4">
                <div class="flex items-center">
                    <div class="ml-4 font-semibold text-xl text-jule-600 dark:text-jule-400">{{ config('app.name') }}</div>
                </div>
                <div class="flex items-center space-x-4">
                @if (Route::has('login'))
                    <nav class="flex items-center justify-end gap-4">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                                {{ __('Dashboard') }}
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="text-white font-medium py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2 transition-colors flex items-center justify-center cursor-pointer bg-jule-600 hover:bg-jule-700 focus:ring-jule-500">
                                {{ __('Log in') }}
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="text-white font-medium py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2 transition-colors flex items-center justify-center cursor-pointer bg-jule-400 hover:bg-jule-500 focus:ring-jule-500">
                                    {{ __('Create Account') }}
                                </a>
                            @endif
                        @endauth
                    </nav>
                @endif
                </div>
            </div>
        </header>

        <div class="flex flex-1 overflow-hidden">
            <main class="flex-1 overflow-auto bg-gray-100 dark:bg-gray-900 content-transition">
                <div class="p-6 lg:max-w-3/4 mx-auto">
                    <div class="my-6">
                        <h1 class="text-4xl text-gray-600 dark:text-gray-100">{{ __('Welcome to Fewtch!')}}</h1>
                        <p class="text-gray-600 dark:text-gray-400 mt-3">{{ __('Send an email to your Future self.') }}</p>
                    </div>

                    @include('forms.message-form')

                </div>
            </main>
        </div>
    </div>
</body>
</html>
