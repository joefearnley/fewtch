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
                            <a href="{{ route('dashboard') }}" class="text-white font-medium py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2 transition-colors flex items-center justify-center cursor-pointer bg-jule-600 hover:bg-jule-700 focus:ring-jule-500">
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
                    @session('status')
                        <div x-data="{ showStatusMessage: true }" x-show="showStatusMessage"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 transform -translate-y-2"
                            x-transition:enter-end="opacity-100 transform translate-y-0"
                            x-transition:leave="transition ease-in duration-300"
                            x-transition:leave-start="opacity-100 transform translate-y-0"
                            x-transition:leave-end="opacity-0 transform -translate-y-2"
                            class="mb-6 bg-green-50 dark:bg-green-900 border-l-4 border-green-500 p-4 rounded-md">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-green-500 dark:text-green-400"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm text-green-700 dark:text-green-200">{{ session('status') }}</p>
                                </div>
                                <div class="ml-auto pl-3">
                                    <div class="-mx-1.5 -my-1.5">
                                        <button @click="showStatusMessage = false"
                                            class="inline-flex rounded-md p-1.5 text-green-500 dark:text-green-400 hover:bg-green-100 dark:hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                            <span class="sr-only">{{ __('Dismiss') }}</span>
                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endsession
                    <div class="my-6">
                        <h1 class="text-4xl text-gray-600 dark:text-gray-100">{{ __('Welcome to Futch!')}}</h1>
                        <p class="text-gray-600 dark:text-gray-400 mt-3">{{ __('Send an email to your Future self.') }}</p>
                    </div>

                    @include('forms.message-form')

                </div>
            </main>
        </div>
    </div>
</body>
</html>
