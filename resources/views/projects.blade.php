<x-app-layout>
    <x-slot name="header">
        <x-header header='Projects' />
    </x-slot>
        <x-project-form :projects="$projects"/>    
</x-app-layout>
