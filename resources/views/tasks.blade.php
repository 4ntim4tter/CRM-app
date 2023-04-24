<x-app-layout>
    <x-slot name="header">
        <x-header header='Tasks' />
    </x-slot>
    <div class="p-1">
        @if (session('status'))
            <div class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-red-900 dark:bg-red-300 dark:border-gray-500"
                role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>
    <x-task-table :tasks=$tasks/>
    <div class="px-4 text-gray-800 dark:text-gray-200 leading-tight" style="max-height: 250px">
    </div>
</x-app-layout>