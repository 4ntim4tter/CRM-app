<x-app-layout>
    <x-slot name="header" style="display: inline">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-5 inline-flex" style="min-width: 100%">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="min-width:45%">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __('User Activity Log') }}
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="min-width:45%">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __('Clients') }}
                </div>
            </div>
        </div>
    </div>
    <div class="py-1 inline-flex" style="min-width: 100%">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="min-width:45%">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __('Client Deals Started') }}
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="min-width:45%">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __('Deals Chart') }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
