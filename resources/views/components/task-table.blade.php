@aware(['tasks' => $tasks])

<table class="w-0.5 text-sm text-left text-gray-500 dark:text-gray-400">
    <thead>
        <tr>
            <th scope="col" class="px-6 py-3">ID</th>
            <th scope="col" class="px-6 py-3">Name</th>
            <th scope="col" class="px-6 py-3">Description</th>
            <th scope="col" class="px-6 py-3">Client</th>
            <th scope="col" class="px-6 py-3">User</th>
            <th scope="col" class="px-6 py-3">ProjectID</th>
            <th scope="col" class="px-6 py-3">Status</th>
            <th scope="col" class="px-6 py-3">Deadline</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tasks as $task)
            <tr
                class="shadow-md sm:rounded-xl bg-white border-b
                @if ($task->id == request()->route()->id && Route::is('tasks.edit')) dark:bg-gray-600
                @else dark:bg-gray-800 @endif dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                @if (Route::is('tasks.trashed'))
                    <form action="{{ route('tasks.destroy', $task) }}" method='post'>
                    @else
                    <form action="{{ route('tasks.delete', $task) }}" method='post'>
                @endif
                @csrf
                @method('delete')
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $task->id }}</th>
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $task->name }}</td>
                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white"
                    style="max-width: 250px; overflow:hidden;">
                    {{ $task->description }}
                </td>

                <td class="px-6 py-4">{{ $task->assigned_client }}</td>
                <td class="px-6 py-4">{{ $task->assigned_user }}</td>
                <td class="px-6 py-4">{{ $task->project_id }}</td>
                <td class="px-6 py-4">
                    @if ($task->status)
                        Open
                    @else
                        Closed
                    @endif
                </td>
                <td class="px-6 py-4">{{ date($task->deadline) }}</td>
                <td class="px-6 py-4 inline-block">

                    @if (Route::is('tasks.trashed'))
                        <a href="{{ route('tasks.restore', $task->id) }}"
                            class="inline-flex items-center px-6 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Restore</a>
                    @else
                        <a href="{{ route('tasks.edit', $task->id) }}"
                            class="inline-flex items-center px-6 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Edit</a>
                    @endif
                    @can('view', $task)
                        @if (Route::is('tasks.trashed'))
                            <x-danger-button onclick="return confirm ('Are you sure?')">{{ __('Wipe') }}
                            </x-danger-button>
                        @else
                            <x-danger-button onclick="return confirm ('Are you sure?')">{{ __('Delete') }}
                            </x-danger-button>
                        @endif
                    @endcan
                    </div>
                </td>
                </form>
            </tr>
        @endforeach
    </tbody>
</table>
