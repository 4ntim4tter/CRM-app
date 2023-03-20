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
                    @if (Route::is('clients')) dark:bg-gray-700 @endif
                    ">
                    <span class="flex-1 ml-3 whitespace-nowrap" style="font-size: 20px">Clients</span>
                </a>
                @if (Route::is('clients'))
                    <div class="px-7 flex-1 ml-2 whitespace-nowrap" style="font-size: 16px">
                        <table style="border-left: 1px solid white">
                            <tr>
                                <td class="hover:border-b hover:border-white hover:border-solid">
                                    <a href="" class="flex items-center text-base font-normal dark:text-white">
                                        &nbsp&nbsp Add Client &nbsp&nbsp
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
                    @if (Route::is('projects')) dark:bg-gray-700 @endif
                    ">
                    <span class="flex-1 ml-3 whitespace-nowrap" style="font-size: 20px">Projects</span>
                </a>
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
