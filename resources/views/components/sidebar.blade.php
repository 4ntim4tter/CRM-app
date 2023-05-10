    <div class="p-5 bg-gray-50 dark:bg-gray-800" style="height: 100%;">
        <ul class="hidden-border space-y-3">
            <li>
                <a href="{{ route('dashboard') }}"
                    class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700
                    @if (Route::is('dashboard')) dark:bg-gray-700 @endif
                    ">
                    <span class="flex-1 ml-3 whitespace-nowrap" style="font-size: 20px">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('clients') }}"
                    class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700
                    @if (Route::is('clients') || Route::is('client.create') || Route::is('client.edit')) dark:bg-gray-700 @endif
                    ">
                    <span class="flex-1 ml-3 whitespace-nowrap" style="font-size: 20px">Clients</span>
                </a>
                @if (Route::is('clients') || Route::is('client.create') || Route::is('client.edit') || Route::is('client.trashed'))
                    <div class="px-2 flex-1 ml-2">
                        <a href="{{ route('client.create') }}"
                            class="rounded-md flex items-center text-base font-normal dark:text-white px-2
                                        @if (Route::is('client.create')) dark:bg-gray-700 @endif"
                            style="font-size: 12px">
                            Add Client
                        </a>
                        @can('view', App\Models\Client::class)
                            <a href="{{ route('client.trashed') }}"
                                class="rounded-md flex items-center text-base font-normal dark:text-white px-2
                                        @if (Route::is('client.trashed')) dark:bg-gray-700 @endif"
                                style="font-size: 12px">
                                View Deleted
                            </a>
                        @endcan
                    </div>
                @endif
            </li>
            <li>
                <a href="{{ route('projects') }}"
                    class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700
                    @if (Route::is('projects') || Route::is('project.create') || Route::is('project.edit') || Route::is('project.trashed')) dark:bg-gray-700 @endif
                    ">
                    <span class="flex-1 ml-3 whitespace-nowrap" style="font-size: 20px">Projects</span>
                </a>
                @if (Route::is('projects') || Route::is('project.create') || Route::is('project.edit') || Route::is('project.trashed'))
                    <div class="px-2 flex-1 ml-2">
                        <a href="{{ route('project.create') }}"
                            class="rounded-md flex items-center text-base font-normal dark:text-white px-2
                                        @if (Route::is('project.create')) dark:bg-gray-700 @endif"
                            style="font-size: 12px; white-space: nowrap;">
                            Add Project
                        </a>
                        @can('view', App\Models\Project::class)
                            <a href="{{ route('project.trashed') }}"
                                class="rounded-md flex items-center text-base font-normal dark:text-white px-2
                                        @if (Route::is('project.trashed')) dark:bg-gray-700 @endif"
                                style="font-size: 12px; white-space: nowrap;">
                                View Deleted
                            </a>
                        @endcan
                    </div>
                @endif
            </li>
            <li>
                <a href="{{ route('tasks') }}"
                    class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700
                    @if (Route::is('tasks') ||
                            Route::is('tasks.project') ||
                            Route::is('tasks.create') ||
                            Route::is('tasks.edit') ||
                            Route::is('tasks.trashed')) dark:bg-gray-700 @endif
                    ">
                    <span class="flex-1 ml-3 whitespace-nowrap" style="font-size: 20px">Tasks</span>
                </a>
                @if (Route::is('tasks.project') || Route::is('tasks.create') || Route::is('tasks.edit') || Route::is('tasks.trashed'))
                    <div class="px-2 flex-1 ml-2">
                        @can('view', App\Models\Task::class)
                            <a href="{{ route('tasks.trashed', request()->route()->project) }}"
                                class="rounded-md flex items-center text-base font-normal dark:text-white px-2
                                        @if (Route::is('project.trashed')) dark:bg-gray-700 @endif"
                                style="font-size: 12px; white-space: nowrap;">
                                View Deleted
                            </a>
                        @endcan
                    </div>
                @endif
            </li>
        </ul>
    </div>
