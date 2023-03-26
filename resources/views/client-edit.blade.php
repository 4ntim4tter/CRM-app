<x-app-layout>
    @if(Route::is('client.edit'))
        <x-slot name="header">
            <x-header header='Edit Client'/>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        <x-client-form :client="$client"/>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if(Route::is('client.create'))
        <x-slot name="header">
            <x-header header='Create Client'/>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        <x-client-form/>
                    </div>
                </div>
            </div>
        </div>
    @endif
</x-app-layout>
