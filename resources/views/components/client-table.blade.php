@aware(['clients' => $clients])

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead >
            <tr>
                <th scope="col" class="px-6 py-3">ID</th>
                <th scope="col" class="px-6 py-3">Name</th>
                <th scope="col" class="px-6 py-3">Email</th>
                <th scope="col" class="px-6 py-3">Created at:</th>
                <th scope="col" class="px-6 py-3">Updated at:</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clients as $client)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <form action="{{ route('client.delete', $client) }}" method='post'>
                        @csrf
                        @method('delete')
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $client->id }}</th>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $client->name }}</td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $client->email }}</td>
                        <td class="px-6 py-4">{{ $client->created_at }}</td>
                        <td class="px-6 py-4">{{ $client->updated_at }}</td>
                        <td class="px-6 py-4">
                            @can('view', $client)
                            <a href="{{ route('client.edit', $client) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Edit</a>
                            <x-danger-button onclick="return confirm ('Are you sure?')">{{ __('Delete') }}</x-danger-button>
                            @endcan
                        </td>
                    </form>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>