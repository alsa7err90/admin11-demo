<x-admin-layout>
    <x-slot name="header">
        {{ __('User Management') }}
    </x-slot>

    <x-slot name="subheader">
        {{ __(' Edit User Roles') }}
    </x-slot>

    <x-slot name="button">
        <x-button.link href="{{ route('admin.users.index') }}">Back</x-button.link>
    </x-slot>

    <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
        @csrf
        @method('PUT')
        <x-input.multi_select name="roles[]" label="Roles">
            @foreach ($roles as $role)
                <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                    {{ $role->name }}
                </option>
            @endforeach
        </x-input.multi_select>

        <x-button.primary type='submit'>
            {{ __('Update Roles') }}
        </x-button.primary>

    </form>

</x-admin-layout>
