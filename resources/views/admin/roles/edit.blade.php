<x-admin-layout>
    <x-slot name="header">
        {{ __('Roles Management') }}
    </x-slot>

    <x-slot name="subheader">
        {{ __('Edit Role') }}
    </x-slot>

    <x-slot name="button">
        <x-button.link href="{{ route('admin.roles.index') }}">Back</x-button.link>
    </x-slot>

    <form method="POST" action="{{ route('admin.roles.update', $role->id) }}">
        @csrf
        @method('PUT')

        <x-input.text name="name" required value="{{ $role->name }}" label="Name" />

        <x-input.multi_select name="permissions[]" label="Permissions" >
            @foreach ($permissions as $permission)
                <option value="{{ $permission->id }}" {{ $role->hasPermissionTo($permission->name) ? 'selected' : '' }}>
                    {{ $permission->name }}
                </option>
            @endforeach
        </x-input.multi_select>

        <x-button.primary type='submit'>
            {{ __('Update Role') }}
        </x-button.primary>

    </form>

</x-admin-layout>
