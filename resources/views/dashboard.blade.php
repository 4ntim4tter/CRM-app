<x-app-layout>
    <x-slot name="header">
        <x-header header='Dashboard'/>
    </x-slot>
    <div class="py-5 inline-flex" style="min-width: 100%">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="min-width:50%; max-width: 50%">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg py-2">
                <div class="px-3 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('User Activity Log') }}
                </div>
                <div class="px-4 text-gray-800 dark:text-gray-200 leading-tight overflow-y-scroll"
                    style="max-height: 250px">
                    @foreach ($logs as $log)
                        <p>{{ $log->created_at }}: {{ $log->name  }}: {{ $log->log }}</p>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="min-width:50%; max-width: 50%">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg py-2">
                <div class="px-3 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Clients') }}
                </div>
                <div class="px-4 text-gray-800 dark:text-gray-200 leading-tight overflow-y-scroll"
                    style="max-height: 250px">
                    @foreach ($clients as $index => $client)
                        <p>{{ $index + 1 }}. {{ $client->name }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="py-1 inline-flex" style="min-width: 100%">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="min-width:50%; max-width: 50%">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg py-2">
                <div class="px-3 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Client Deals Started') }}
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="min-width:50%; max-width: 50%">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg py-2">
                <div class="px-3 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Deals Chart') }}
                </div>
                <div class="px-3">
                    {!! $chart->renderHtml() !!}
                </div>
                {!! $chart->renderChartJsLibrary() !!}
                {!! $chart->renderJs() !!}

            </div>
        </div>
    </div>
</x-app-layout>
