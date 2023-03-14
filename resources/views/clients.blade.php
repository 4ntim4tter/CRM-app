<x-app-layout>
    <x-slot name="header">
        <x-header header='Clients' />
    </x-slot>
    <div class="px-4 text-gray-800 dark:text-gray-200 leading-tight" style="max-height: 250px">
        @foreach ($clients as $index => $client)
            <p>{{ $index + 1 }}. {{ $client->name }}</p>
        @endforeach
    </div>
</x-app-layout>
