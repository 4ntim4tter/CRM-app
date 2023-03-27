@isset($project)
<form method="post" action="{{ route('project.store', ['id' => $project->id]) }}" enctype="multipart/form-data">
    @csrf
    @method('post')

    <div class="pb-1">
        <x-input-label for="name" :value="__('Name')" />
        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $project->name)" required autofocus autocomplete="name" />
        <x-input-error class="mt-2" :messages="$errors->get('name')" />
    </div>

    <div>
        <x-input-label for="client_name" :value="__('Client Name')" />
        <x-text-input id="client_name" name="client_name" type="text" class="mt-1 block w-full" :value="old('client_name', $project->client_name)" required autofocus autocomplete="client_name" />
        <x-input-error class="mt-2" :messages="$errors->get('client_name')" />
    </div>

    <div>
        <x-input-label for="description" :value="__('Description')" />
        <x-text-field id="description" name="description" type="text" class="mt-1 block w-full text-justify" autofocus>
            {{ old('description', $project->description) }}
        </x-text-field>
    </div>

    <div>
        <select name="users" id="users">
            <option value="user">User</option>
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

    <div>
        <x-input-label for="name" :value="__('Name')" />
        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required autofocus autocomplete="name" />
        <x-input-error class="mt-2" :messages="$errors->get('name')" />
    </div>

    <div>
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"  required autocomplete="username" />
        <x-input-error class="mt-2" :messages="$errors->get('email')" />
    </div>

    <div class="flex items-center gap-4 py-2">
        <x-primary-button>{{ __('Save') }}</x-primary-button>
    </div>
</form>
@endisset