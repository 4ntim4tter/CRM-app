@props(['header' => 'Default'])

<a class="pointer-events-none font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
    {{ $header }}
</a>
<div style="float: right">
    <x-user-dropdown />
</div>
