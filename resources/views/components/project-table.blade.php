@aware(['projects'])

<div class="p-1 relative overflow-x-auto shadow-md sm:rounded-lg">

    <label class="relative inline-flex items-center cursor-pointer float-right">
        <input id="checkbox" name="checkbox" type="checkbox" class="sr-only peer">
        <div
            class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
        </div>
        <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">
            Show Trashed
        </span>
    </label>

    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead>
            <tr>
                <th scope="col" class="px-6 py-3">ID</th>
                <th scope="col" class="px-6 py-3">Name</th>
                <th scope="col" class="px-6 py-3">Client Name</th>
                <th scope="col" class="px-6 py-3">Description</th>
                <th scope="col" class="px-6 py-3">User Name</th>
                <th scope="col" class="px-6 py-3">Status</th>
                <th scope="col" class="px-6 py-3">Deadline</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <form action="{{ route('project.delete', $project) }}" method='post'>
                        @csrf
                        @method('delete')
                        <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $project->id }}</th>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $project->name }}</td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                            style="white-space: nowrap; max-width: 150px; overflow-x:hidden">{{ $project->client_name }}
                        </td>
                        <td class="px-6 py-4" style="white-space: nowrap; max-width: 150px; overflow-x:hidden;"
                            title="{{ $project->description }}">{{ $project->description }}</td>
                        <td class="px-6 py-4">{{ $project->user_name }}</td>
                        <td class="px-6 py-4">
                            @if ($project->status)
                                Open
                            @else
                                Closed
                            @endif
                        </td>
                        <td class="px-6 py-4">{{ $project->deadline }}</td>
                        <td class="px-6 py-4 inline-block">
                            <a
                                href="{{ route('project.edit', $project) }}"class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Edit</a>
                            <x-danger-button onclick="return confirm ('Are you sure?')">{{ __('Delete') }}
                            </x-danger-button>
                        </td>
                    </form>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
