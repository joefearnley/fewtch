<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - {{ config('app.name') }}</title>
    @vite('resources/css/app.css')
    <script>
        function applyTheme() {
            const userPref = localStorage.getItem('darkMode');
            const systemPref = window.matchMedia('(prefers-color-scheme: dark)').matches;
            if (userPref === 'true' || (userPref === null && systemPref)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        }
        // Initial theme application
        applyTheme();
        // Listen for system theme changes
        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', (e) => {
            if (!('darkMode' in localStorage)) {
                applyTheme();
            }
        });
    </script>
</head>

<body class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-200 antialiased" x-data="{
    darkMode: localStorage.getItem('darkMode') === 'true',
    toggleDarkMode() {
        this.darkMode = !this.darkMode;
        localStorage.setItem('darkMode', this.darkMode);
    }
}"
    :class="{ 'dark': darkMode }">

        <header class="bg-white dark:bg-gray-800 shadow-sm z-20 border-b border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between h-16 px-4">
                <div class="flex items-center">
                    <div class="ml-4 font-semibold text-xl text-jule-600 dark:text-jule-400">
                        <a href="{{ route('home')  }}">{{ config('app.name') }}</a>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                @if (Route::has('login') && !request()->routeIs('login') && !request()->routeIs('register'))
                    <nav class="flex items-center justify-end gap-4">
                        @auth
                            <a href="{{ route('dashboard') }}" class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
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

    <div class="min-h-screen flex flex-col">
        <main class="flex-1 flex justify-center p-6 mt-24">
            <div class="w-full max-w-md">
                {{ $slot }}
            </div>
        </main>
    </div>
</body>

</html>
