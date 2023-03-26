@isset($client)
<form method="post" action="{{ route('client.store', ['id' => $client->id]) }}" enctype="multipart/form-data">
    @csrf
    @method('post')

    <div>
        <x-input-label for="name" :value="__('Name')" />
        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $client->name)" required autofocus autocomplete="name" />
        <x-input-error class="mt-2" :messages="$errors->get('name')" />
    </div>

    <div>
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $client->email)" required autocomplete="username" />
        <x-input-error class="mt-2" :messages="$errors->get('email')" />
    </div>

    <div class="flex items-center gap-4 py-2">
        <x-primary-button>{{ __('Save') }}</x-primary-button>
    </div>
</form>
@else
<form method="post" action="{{ route('client.store') }}" enctype="multipart/form-data">
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