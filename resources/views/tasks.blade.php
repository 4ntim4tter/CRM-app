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
    <x-dropdown align="bottom" width="48" contentClasses="py-1 dark:bg-slate-50" position="absolute w-48">
        <x-slot name="trigger">
            <a href="#"
                class="inline-flex items-center px-4 py-2 ml-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md dark:bg-gray-200 dark:text-gray-800 hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">Select
                Project</a>
        </x-slot>

        <x-slot name="content">
            @forelse ($projects as $project)
                <x-dropdown-link href="{{ route('tasks.project', $project->id) }}"
                    class="my-1 text-center uppercase tracking wideset dark:hover:bg-gray-500 dark:bg-slate-50 dark:text-gray-800 hover:text-slate-50 mr">
                    {{ $project->name }}
                </x-dropdown-link>
            @empty
                <p
                    class="my-1 text-center uppercase tracking wideset dark:hover:bg-gray-500 dark:bg-slate-50 dark:text-gray-800 hover:text-slate-50 mr">
                    You have no projects.</p>
            @endforelse
        </x-slot>

    </x-dropdown>
    <div class="flex-wrap inline-flex">
        <div class="py-2">
            <div class="ml-24 my-12 space-y-6">
                <div class="p-4 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <x-task-table :tasks=$tasks />
                </div>
            </div>
        </div>
        <div class="py-2">
            <div class="mx-2 my-12 space-y-2">
                <div class="p-4 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <x-task-form/>
                </div>
            </div>
        </div>
    </div>

    </div>
</x-app-layout>
