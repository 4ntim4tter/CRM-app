<x-app-layout>
    <x-slot name="header">
        <x-header header='Projects' />
    </x-slot>
    <x-project-table :projects="$projects" />
    <div class="p-1">
        {{ $projects->links() }}
    </div>
</x-app-layout>
