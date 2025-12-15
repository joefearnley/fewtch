<x-layouts.app>

    <div class="mb-6">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">{{ __('Dashboard')}}</h1>
                <p class="text-gray-600 dark:text-gray-400 mt-1">{{ __('Welcome to the dashboard') }}</p>
            </div>
            <div>
                <a href="/" class="text-white font-medium py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2 transition-colors flex items-center justify-center cursor-pointer bg-jule-600 hover:bg-jule-700 focus:ring-jule-500">
                    {{ __('Create Message') }}
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 h-4 w-4 ml-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Emails Sent') }}</p>
                    <p class="text-2xl font-bold text-gray-800 dark:text-gray-100 mt-1">
                        @if (!$sentMessages->isEmpty())
                            {{ $sentMessages->count() }}
                        @else
                            --
                        @endif
                    </p>
                    <p class="text-xs text-gray-500 flex items-center mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 10l7-7m0 0l7 7m-7-7v18" />
                        </svg>
                        {{ __('No data') }}
                    </p>
                </div>
                <div class="bg-jule-100 dark:bg-jule-900 p-3 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-jule-500 dark:text-jule-300">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                    </svg>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Emails to be Sent') }}</p>
                    <p class="text-2xl font-bold text-gray-800 dark:text-gray-100 mt-1">
                        @if (!$queuedMessages->isEmpty())
                            {{ $queuedMessages->count() }}
                        @else
                            --
                        @endif
                    </p>
                    <p class="text-xs text-gray-500 flex items-center mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 10l7-7m0 0l7 7m-7-7v18" />
                        </svg>
                        {{ __('No data') }}
                    </p>
                </div>
                <div class="bg-green-100 dark:bg-green-900 p-3 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-green-500 dark:text-green-300">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Cancelled Emails') }}</p>
                    <p class="text-2xl font-bold text-gray-800 dark:text-gray-100 mt-1">
                        @if (!$cancelledMessages->isEmpty())
                            {{ $cancelledMessages->count() }}
                        @else
                            --
                        @endif
                    </p>
                    <p class="text-xs text-gray-500 flex items-center mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 10l7-7m0 0l7 7m-7-7v18" />
                        </svg>
                        {{ __('No data') }}
                    </p>
                </div>
                <div class="bg-red-100 dark:bg-red-900 p-3 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-red-500 dark:text-red-300">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700 mb-4">
            @if ($totalMessages->isEmpty())
                <p class="text-gray-600 dark:text-gray-400">{{ __('You have not created any messages yet.') }}</p>
            @else
            <table class="w-full table-auto">
                <thead>
                    <tr>
                        <th class="text-sm border-b border-gray-200 p-4 pt-0 pb-3 text-left font-medium dark:border-gray-600 text-gray-600 dark:text-gray-400">Status</th>
                        <th class="text-sm border-b border-gray-200 p-4 pt-0 pb-3 text-left font-medium dark:border-gray-600 text-gray-600 dark:text-gray-400">Created On</th>
                        <th class="text-sm border-b border-gray-200 p-4 pt-0 pb-3 text-left font-medium dark:border-gray-600 text-gray-600 dark:text-gray-400">Sending On</th>
                        <th class="text-sm border-b border-gray-200 p-4 pt-0 pb-3 text-left font-medium dark:border-gray-600 text-gray-600 dark:text-gray-400">Subject</th>
                        <th class="text-sm border-b border-gray-200 p-4 pt-0 pb-3 text-left font-medium dark:border-gray-600 text-gray-600 dark:text-gray-400"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($totalMessages as $message)
                    <tr>
                        <td class="text-sm border-b border-gray-100 p-4 dark:border-gray-700">
                        @if ($message->cancelled)
                            <div style="" class="flex flex-row items-center text-xs px-3 py-1 bg-pink-200 text-pink-900 rounded-full w-fit text-center">
                                <span class="pr-1">{{ $message->status }}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                        @elseif ($message->sent)
                            <div style="" class="flex flex-row items-center text-xs px-3 py-1 bg-emerald-200 text-emerald-900 rounded-full w-fit text-center">
                                <span class="pr-1">{{ $message->status }}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                        @else
                            <div style="" class="flex flex-row items-center text-xs px-3 py-1 bg-yellow-200 text-yellow-900 rounded-full w-fit text-center">
                                <span class="pr-1">{{ $message->status }}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                        @endif
                            </div>
                        </td>
                        <td class="text-sm border-b border-gray-100 p-4 text-gray-500 dark:border-gray-700 dark:text-gray-400">{{  \Carbon\Carbon::parse($message->created_at)->format('m/d/Y')  }}</td>
                        <td class="text-sm border-b border-gray-100 p-4 text-gray-500 dark:border-gray-700 dark:text-gray-400">{{  \Carbon\Carbon::parse($message->send_date)->format('m/d/Y')  }}</td>
                        <td class="text-sm border-b border-gray-100 p-4 text-gray-500 dark:border-gray-700 dark:text-gray-400">{{ $message->subject }}</td>
                        <td class="text-sm border-b border-gray-100 p-4 text-gray-500 dark:border-gray-700 dark:text-gray-400">
                            <div class="flex">
                                <a href="{{ route('messages.edit', $message) }}" class="text-jule-600 hover:underline dark:text-jule-400" title="{{ __('Edit Message') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                    </svg>
                                </a>
                                @if ($message->cancelled)
                                <form action="{{ route('messages.requeue', $message) }}" method="POST" class="text-sky-500 hover:underline ml-4">
                                    @csrf
                                    <button type="subsmit" class="cursor-pointer" title="{{ __('Requeue Message') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                                        </svg>
                                    </button>
                                </form>
                                @elseif (!$message->sent)
                                <form action="{{ route('messages.cancel', $message) }}" method="POST" class="text-amber-500 hover:underline ml-4">
                                    @csrf
                                    <button type="subsmit" class="cursor-pointer" title="{{ __('Cancel Message') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 0 0 5.636 5.636m12.728 12.728A9 9 0 0 1 5.636 5.636m12.728 12.728L5.636 5.636" />
                                        </svg>
                                    </button>
                                </form>
                                @endif
                                <form action="{{ route('messages.destroy', $message) }}" method="DELETE" class="text-red-500 hover:underline ml-4">
                                    @csrf
                                    <button type="submit" class="cursor-pointer" title="{{ __('Delete Message') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>

</x-layouts.app>
