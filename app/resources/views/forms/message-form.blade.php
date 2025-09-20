<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
    <form method="POST" action="{{ route('message.store') }}" class="space-y-3">
        @csrf
        <textarea
            class="w-full p-4 rounded-lg text-gray-700 dark:text-gray-300 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-jule-500 focus:border-transparent"
            name="message-body"
            id="message-body"
            rows="10"
            placeholder="Compose your message here..."></textarea>
        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
            <div>
                <div class="inline-block mr-6">
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
                        <input type="hidden" name="send-in" id="send-in" value="3 Months">
                    </div>
                </div>
                <div class="inline-block mr-6 text-left">
                    <x-forms.input label="Specify a Date:" name="send-date" id="send-date" type="date" />
                </div>
            </div>

            <div class="flex justify-end mt-4 md:mt-0">
                <x-button>{{ __('Fewtch It!') }}</x-button>
            </div>
        </div>
    </form>
</div>

@vite(['resources/js/messageForm.js'])
