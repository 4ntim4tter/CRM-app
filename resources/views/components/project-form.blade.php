<form method="post" action="" class="">
    @csrf
    @method('post')
    <div class="pb-4">
        <x-input-label for="name" style="font-size: 18px" class="pb-2" :value="__('Project Name')"/>
        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required autofocus
            autocomplete="name"/>
        <x-input-error class="mt-2" :messages="$errors->get('name')"/>
    </div>

    <div class="pb-4">
        <x-input-label for="name" style="font-size: 18px" class="pb-2" :value="__('Category')"/>
        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required autofocus
            autocomplete="name"/>
        <x-input-error class="mt-2" :messages="$errors->get('name')"/>
    </div>
</form>