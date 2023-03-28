@isset($project)
<form method="post" action="{{ route('project.store', ['id' => $project->id]) }}" enctype="multipart/form-data">
    @csrf
    @method('post')

    <div class="pb-1">
        <x-input-label for="name" :value="__('Name')" />
        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $project->name)" required autofocus autocomplete="name" />
        <x-input-error class="mt-2" :messages="$errors->get('name')" />
    </div>

    <div class="pb-1">
        <x-input-label for="clients" :value="__('Client')" />
        <x-select-form :selectoption="$clients"/>
    </div>

    <div class="pb-1">
        <x-input-label for="description" :value="__('Description')" />
        <x-text-field id="description" name="description" type="text" class="mt-1 block w-full text-justify" autofocus>
            {{ old('description', $project->description) }}
        </x-text-field>
    </div>

    <div class="pb-1">
        <x-input-label for="users" :value="__('User')" />
        <x-select-form :selectoption="$users"/>
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
        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required autofocus autocomplete="name" />
        <x-input-error class="mt-2" :messages="$errors->get('name')" />
    </div>

    <div class="pb-1">
        <x-input-label for="clients" :value="__('Client')" />
        <x-select-form :selectoption="$clients"/>
    </div>

    <div class="pb-1">
        <x-input-label for="description" :value="__('Description')" />
        <x-text-field id="description" name="description" type="text" class="mt-1 block w-full text-justify" autofocus>
        </x-text-field>
    </div>

    <div class="pb-1">
        <x-input-label for="users" :value="__('User')" />
        <x-select-form :selectoption="$users"/>
    </div>

    <div class="flex items-center gap-4 py-2">
        <x-primary-button>{{ __('Save') }}</x-primary-button>
    </div>
</form>
@endisset