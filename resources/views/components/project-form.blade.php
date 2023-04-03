@isset($project)
    <form method="post" action="{{ route('project.store', ['id' => $project->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('post')
        {{-- {{ dd($project->client_name) }} --}}
        <div class="pb-1">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $project->name)" required
                autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div class="pb-1">
            <x-input-label for="client" :value="__('Client')" />
            <select name="client" id="client" class='form-control border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm'>
                @foreach ($clients as $option)
                    <option value="{{ $option }}" @if($project->client_name === $option) selected @endif>{{ $option }}</option>
                @endforeach
            </select>
        </div>

        <div class="pb-1">
            <x-input-label for="description" :value="__('Description')" />
            <x-text-field id="description" name="description" type="text" class="mt-1 block w-full text-justify"
                autofocus>
                {{ old('description', $project->description) }}
            </x-text-field>
        </div>

        <div class="pb-1">
            <x-input-label for="user" :value="__('User')" />
            <select name="user" id="user" class='form-control border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm'>
                @foreach ($users as $option)
                    <option value="{{ $option }}" @if($project->user_name === $option) selected @endif>{{ $option }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex items-center gap-4 py-2">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
@else
    <form method="post" action="{{ route('project.store') }}" enctype="multipart/form-data">
        @csrf
        @method('post')

        <div class="pb-1">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required autofocus
                autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div class="pb-1">
            <x-input-label for="client" :value="__('Client')" />
            <select name="client" id="client" class='form-control border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm'>
                @foreach ($clients as $option)
                    <option value="{{ $option }}">{{ $option }}</option>
                @endforeach
            </select>
        </div>

        <div class="pb-1">
            <x-input-label for="description" :value="__('Description')" />
            <x-text-field id="description" name="description" type="text" class="mt-1 block w-full text-justify"
                autofocus>
            </x-text-field>
        </div>

        <div class="pb-1">
            <x-input-label for="user" :value="__('User')" />
            <select name="user" id="user" class='form-control border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm'>
                @foreach ($users as $option)
                    <option value="{{ $option }}">{{ $option }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex items-center gap-4 py-2">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
@endisset
