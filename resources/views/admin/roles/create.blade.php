<x-admin-layout>
    <x-slot name="header">
        {{ __('Roles Management') }}
    </x-slot>

    <x-slot name="subheader">
        {{ __('Create Role') }}
    </x-slot>

    <x-slot name="button">
        <x-button.link href="{{ route('admin.roles.index') }}">Back</x-button.link>
    </x-slot>

    <form method="POST" action="{{ route('admin.roles.store') }}">
        @csrf
        <x-input.text name="name" required label="Name" />

        <x-input.multi_select name="permissions[]" label="Permissions">
            @foreach ($permissions as $permission)
                <option value="{{ $permission->id }}">{{ $permission->name }}</option>
            @endforeach
        </x-input.multi_select>

        <x-button.primary type='submit'>
            {{ __('Create Role') }}
        </x-button.primary>

    </form>

</x-admin-layout>
