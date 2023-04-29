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
    <x-dropdown align="bottom" width="48" contentClasses="py-1 dark:bg-slate-50" position="relative w-48">
        <x-slot name="trigger">
            <a href="#"
                class="inline-flex items-center px-4 py-2 ml-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md dark:bg-gray-200 dark:text-gray-800 hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">Select
                Project</a>
        </x-slot>

        <x-slot name="content">
            {{-- {{ dd(auth()->user()->project) }} --}}
            @forelse (auth()->user()->project as $project)
                <x-dropdown-link
                    class="my-1 text-center uppercase tracking wideset dark:hover:bg-gray-500 dark:bg-slate-50 dark:text-gray-800 hover:text-slate-50 mr">
                    {{ $project->name }}
                </x-dropdown-link>
            @empty
                <p class="text-white">Empty</p>
            @endforelse
        </x-slot>

    </x-dropdown>

    {{-- <x-task-table :tasks=$tasks />
    <div class="p-1">
        {{ $tasks->links() }}
    </div> --}}
    </div>
</x-app-layout>
