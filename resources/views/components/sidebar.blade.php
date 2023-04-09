    <div class="p-5 bg-gray-50 dark:bg-gray-800" style="height: 100%;">
        <ul class="space-y-3">
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
                @if (Route::is('clients') || Route::is('client.create') || Route::is('client.edit'))
                    <div class="px-2 flex-1 ml-2">
                        <table style="">
                            <tr>
                                <td class="hover:border-b hover:border-l hover:border-gray-500 hover:border-solid">
                                    <a href="{{ route('client.create') }}"
                                        class="flex items-center text-base font-normal dark:text-white"
                                        style="font-size: 12px">
                                        &nbsp Add Client
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </div>
                @endif
            </li>
            <li>
                <a href="{{ route('projects') }}"
                    class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700
                    @if (Route::is('projects') || Route::is('project.create') || Route::is('project.edit')) dark:bg-gray-700 @endif
                    ">
                    <span class="flex-1 ml-3 whitespace-nowrap" style="font-size: 20px">Projects</span>
                </a>
                @if (Route::is('projects') || Route::is('project.create') || Route::is('project.edit'))
                    <div class="px-2 flex-1 ml-2">
                        <table>
                            <tr>
                                <td class="hover:border hover:border-gray-500 hover:border-solid px-2">
                                    <a href="{{ route('project.create') }}"
                                        class="flex items-center text-base font-normal dark:text-white"
                                        style="font-size: 12px">
                                        Add Project
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="hover:border hover:border-gray-500 hover:border-solid px-2">
                                    <a href="{{ route('project.create') }}"
                                        class="flex items-center text-base font-normal dark:text-white"
                                        style="font-size: 12px">
                                        View Deleted                
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </div>
                @endif
            </li>
            <li>
                <a href="{{ route('tasks') }}"
                    class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700
                    @if (Route::is('tasks')) dark:bg-gray-700 @endif
                    ">
                    <span class="flex-1 ml-3 whitespace-nowrap" style="font-size: 20px">Tasks</span>
                </a>
            </li>
        </ul>
    </div>
