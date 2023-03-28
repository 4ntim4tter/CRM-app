<x-app-layout>
    <x-slot name="header">
        <x-header header='Projects' />
    </x-slot>
    <div class="p-1">
        @if (session('status'))
            <div class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-red-900 dark:bg-red-300 dark:border-gray-500"
                role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>
    <x-project-table :projects="$projects" />
    <div class="p-1">
        {{ $projects->links() }}
    </div>
</x-app-layout>
