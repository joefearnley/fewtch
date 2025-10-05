
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
    <form method="POST" action="{{ route('message.store') }}" class="space-y-3">
        @csrf
        <textarea
            class="w-full mb-0 p-4 rounded-lg text-gray-700 dark:text-gray-300 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-jule-500 focus:border-transparent"
            name="message-body"
            id="message-body"
            rows="10"
            placeholder="Compose your message here..."></textarea>
            @error('content')
                <div class="text-red-700 text-sm mb-4">{{ $message }}</div>
            @enderror
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mt-4">
            <div>
                <div class="flex flex-col md:flex-row md:items-start">
                    <div class="mr-6">
                        <label class="block mb-1 text-left text-sm font-medium text-gray-700 dark:text-gray-300">
                            {{ __('Send this email in:') }}
                        </label>
                        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-2 mt-2" id="send-in-options">
                            <button class="p-2 text-xs flex-shrink-0 rounded-md transition-colors bg-zinc-100 hover:bg-zinc-200 dark:bg-zinc-700 dark:hover:bg-zinc-600 text-foreground cursor-pointer">3 Months</button>
                            <button class="p-2 text-xs flex-shrink-0 rounded-md transition-colors bg-zinc-100 hover:bg-zinc-200 dark:bg-zinc-700 dark:hover:bg-zinc-600 text-foreground cursor-pointer">6 Months</button>
                            <button class="p-2 text-xs flex-shrink-0 rounded-md transition-colors bg-zinc-100 hover:bg-zinc-200 dark:bg-zinc-700 dark:hover:bg-zinc-600 text-foreground cursor-pointer">1 Year</button>
                            <button class="p-2 text-xs flex-shrink-0 rounded-md transition-colors bg-zinc-100 hover:bg-zinc-200 dark:bg-zinc-700 dark:hover:bg-zinc-600 text-foreground cursor-pointer">3 Years</button>
                            <button class="p-2 text-xs flex-shrink-0 rounded-md transition-colors bg-zinc-100 hover:bg-zinc-200 dark:bg-zinc-700 dark:hover:bg-zinc-600 text-foreground cursor-pointer">5 Years</button>
                            <button class="p-2 text-xs flex-shrink-0 rounded-md transition-colors bg-zinc-100 hover:bg-zinc-200 dark:bg-zinc-700 dark:hover:bg-zinc-600 text-foreground cursor-pointer">10 Years</button>
                            <input type="hidden" name="send_in" id="send-in" value="3 Months">
                        </div>
                    </div>
                    <div class="mr-6 text-left">
                        <label for="send_date" class="block ml-1 text-sm font-medium text-gray-700 dark:text-gray-300 mb-1" id="send-date" value="">Specify a Date:</label>
                        <input type="date" id="send_date" placeholder="" name="send_date" class="w-full px-4 py-1.5 rounded-lg text-gray-700 dark:text-gray-300 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent" value="{{ old('send_date') }}">
                    </div>
                </div>
                @if ($errors->has('send_in') || $errors->has('send_date'))
                    @foreach ($errors->get('send_date') as $message)
                        <div class="mt-2 text-red-700 dark:text-red-400 text-sm pb-5">{{ $message }}</div>
                    @endforeach
                    @foreach ($errors->get('send_in') as $message)
                        <div class="mt-2 text-red-700 dark:text-red-400 text-sm pb-5">{{ $message }}</div>
                    @endforeach
                @endif
            </div>
            <div class="flex justify-end mt-4 md:mt-0">
                <x-button>{{ __('Fewtch It!') }}</x-button>
            </div>
        </div>
    </form>
</div>

@vite(['resources/js/messageForm.js'])
