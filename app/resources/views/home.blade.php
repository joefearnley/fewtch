
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <script>
        window.setAppearance = function(appearance) {
            let setDark = () => document.documentElement.classList.add('dark')
            let setLight = () => document.documentElement.classList.remove('dark')
            let setButtons = (appearance) => {
                document.querySelectorAll('button[onclick^="setAppearance"]').forEach((button) => {
                    button.setAttribute('aria-pressed', String(appearance === button.value))
                })
            }
            if (appearance === 'system') {
                let media = window.matchMedia('(prefers-color-scheme: dark)')
                window.localStorage.removeItem('appearance')
                media.matches ? setDark() : setLight()
            } else if (appearance === 'dark') {
                window.localStorage.setItem('appearance', 'dark')
                setDark()
            } else if (appearance === 'light') {
                window.localStorage.setItem('appearance', 'light')
                setLight()
            }
            if (document.readyState === 'complete') {
                setButtons(appearance)
            } else {
                document.addEventListener("DOMContentLoaded", () => setButtons(appearance))
            }
        }
        window.setAppearance(window.localStorage.getItem('appearance') || 'system')
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

                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
                        <form method="POST" action="" class="space-y-3">
                        @csrf
                        <textarea
                            class="w-full p-4 rounded-lg text-gray-700 dark:text-gray-300 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-jule-500 focus:border-transparent"
                            name="message-body"
                            id="message-body"
                            rows="10"
                            placeholder="Compose your message here..."></textarea>

                        <div class="text-end">
                            <div class="inline-block mr-6 ">
                                <label class="block mb-1 text-left text-sm font-medium text-gray-700 dark:text-gray-300">
                                    {{ __('Send this email in:') }}
                                </label>
                                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-2 mt-2">
                                    <button class="p-2 text-xs flex-shrink-0 rounded-md transition-colors bg-zinc-100 hover:bg-zinc-200 dark:bg-zinc-700 dark:hover:bg-zinc-600 text-foreground cursor-pointer">3 Months</button>
                                    <button class="p-2 text-xs flex-shrink-0 rounded-md transition-colors bg-zinc-100 hover:bg-zinc-200 dark:bg-zinc-700 dark:hover:bg-zinc-600 text-foreground cursor-pointer">6 Months</button>
                                    <button class="p-2 text-xs flex-shrink-0 rounded-md transition-colors bg-zinc-100 hover:bg-zinc-200 dark:bg-zinc-700 dark:hover:bg-zinc-600 text-foreground cursor-pointer">1 Year</button>
                                    <button class="p-2 text-xs flex-shrink-0 rounded-md transition-colors bg-zinc-100 hover:bg-zinc-200 dark:bg-zinc-700 dark:hover:bg-zinc-600 text-foreground cursor-pointer">3 Years</button>
                                    <button class="p-2 text-xs flex-shrink-0 rounded-md transition-colors bg-zinc-100 hover:bg-zinc-200 dark:bg-zinc-700 dark:hover:bg-zinc-600 text-foreground cursor-pointer">5 Years</button>
                                    <button class="p-2 text-xs flex-shrink-0 rounded-md transition-colors bg-zinc-100 hover:bg-zinc-200 dark:bg-zinc-700 dark:hover:bg-zinc-600 text-foreground cursor-pointer">10 Years</button>
                                </div>
                            </div>
                             <div class="inline-block mr-6 text-left">
                                <x-forms.input label="Specify a Date:" name="date" type="date" value="2018-07-22" />
                            </div>
                            <div class="inline-block">
                                <x-button>{{ __('Send!') }}</x-button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
