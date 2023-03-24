<x-app-layout>
    <x-slot name="header">
        <x-header header='Projects' />
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pb-1">
            <div class="border-b border-gray-500 p-2 sm:p-4 sm:px-8 bg-white sm:rounded-lg dark:bg-gray-800 shadow dark:text-white">
                <div class="max-w-xl">
                    Create Project
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="border-b border-gray-500 p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <x-project-form/>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
