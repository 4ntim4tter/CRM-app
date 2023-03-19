<x-app-layout>
    <x-slot name="header">
        <x-header header='Clients' />
    </x-slot>
    <div class="p-1">
        @if (session('status'))
            <div class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-red-900 dark:bg-red-300 dark:border-gray-500" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>
        <div class="p-1 relative overflow-x-auto shadow-md sm:rounded-lg">
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
                            <form action="{{ route('clients.delete', ['client' => $client]) }}" method='post'>
                                @csrf
                                @method('delete')
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $client->id }}</th>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $client->name }}</td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $client->email }}</td>
                                <td class="px-6 py-4">{{ $client->created_at }}</td>
                                <td class="px-6 py-4">{{ $client->updated_at }}</td>
                                <td class="px-6 py-4"><x-danger-button onclick="return confirm ('Are you sure?')">{{ __('Delete') }}</x-danger-button></td>
                            </form>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="p-1">
            {{ $clients->links() }}
        </div>
</x-app-layout>
