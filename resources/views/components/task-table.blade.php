@aware(['tasks' => $tasks])

<div class="shadow-md sm:rounded-xl">
    <table class="table-fixed w-full shadow-md sm:rounded-xl text-sm text-left text-gray-500 dark:text-gray-400">
        <thead>
            <tr>
                <th scope="col" class="shadow-md sm:rounded-xl px-6 py-3">ID</th>
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
                    class="shadow-md sm:rounded-xl bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <form action="" method='post'>
                        @csrf
                        @method('post')
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $task->id }}</th>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $task->name }}</td>
                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                            <div class="break-all text-ellipsis nowrap overflow-hidden block">{{ $task->description }}
                            </div>
                        </td>
                        <td class="px-6 py-4">{{ $task->assigned_client }}</td>
                        <td class="px-6 py-4">{{ $task->assigned_user }}</td>
                        <td class="px-6 py-4">{{ $task->project_id }}</td>
                        <td class="px-6 py-4">{{ $task->status }}</td>
                        <td class="px-6 py-4">
                            <div>{{ date($task->deadline) }}</div>
                        </td>

                        <td class="inline-flex align-items-center">
                            <div class="inline-flex">
                                <a href=""
                                    class="inline-flex px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Edit</a>
                                @can('view', $task)
                                    <x-danger-button onclick="return confirm ('Are you sure?')">{{ __('Delete') }}
                                    </x-danger-button>
                                @endcan
                            </div>
                        </td>
                    </form>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>