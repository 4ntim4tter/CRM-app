<form method="post" action="{{ route('tasks.store') }}" enctype="multipart/form-data">
    @csrf
    @method('post')

    <div class="py-1 ml-1">
        <div class="py-1">
            <x-input-label for="name" :value="__('Task Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>
        <div class="py-1">
            <x-input-label for="description" :value="__('Description')" />
            <textarea id="description" name="description" type="text"
                class="mt-1 block w-full text-white rounded-md bg-gray-900 border-gray-700" required></textarea>
        </div>
        <div class="py-1">
            <x-input-label for="assigned_client" :value="__('Aassigned Client')" />
            @isset($project)
                <x-text-input id="assigned_client" name="assigned_client" value="{{ $project->client_name }}" readonly
                    type="text" class="mt-1 block w-full" required autocomplete="assigned_client" />
            @endisset
            @empty($project)
                <x-text-input id="assigned_client" name="assigned_client" type="text" class="mt-1 block w-full" required
                    autocomplete="assigned_client" />
            @endempty
        </div>
        <div class="py-1">
            <x-input-label for="assigned_user" :value="__('Assigned User')" />
            @isset($project)
                <x-text-input id="assigned_user" name="assigned_user" value="{{ $project->user_name }}" readonly
                    type="text" class="mt-1 block w-full" required autocomplete="assigned_user" />
            @endisset
            @empty($project)
                <x-text-input id="assigned_user" name="assigned_user" type="text" class="mt-1 block w-full" required
                    autocomplete="assigned_user" />
            @endempty
        </div>
        <div class="py-1">
            <x-input-label for="deadline" :value="__('Deadline')" />
            <x-text-input id="deadline" name="deadline" type="datetime-local" class="mt-1 block w-full" required
                autocomplete="deadline" />
        </div>
        <div class="py-1">
            <x-input-label for="project" :value="__('Project')" />
            @isset($project)
                <x-text-input id="project" name="project" value="{{ $project->id }}" readonly type="text"
                    class="mt-1 block w-full" required autocomplete="project" />
            @endisset
            @empty($project)
                <x-text-input id="project" name="project" type="text" class="mt-1 block w-full" required
                    autocomplete="project" />
            @endempty
        </div>
        <div class="py-1">
            <x-input-label for="status" class="inline-flex" :value="__('Status:')" />
            <input id="status" name="status" type="checkbox" class="" required/>
        </div>
        <div class="flex items-center gap-4 py-2">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </div>
</form>
