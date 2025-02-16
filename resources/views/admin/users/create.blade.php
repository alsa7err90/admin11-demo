<x-admin-layout>
    <x-slot name="header">
        {{ __('User Management') }}
    </x-slot>

    <x-slot name="subheader">
        {{ __('Create User') }}
    </x-slot>


    <x-slot name="button">
        <x-button.link href="{{ route('admin.users.index') }}">Back</x-button.link>
    </x-slot>

    <form method="POST" action="{{ route('admin.users.store') }}">
        @csrf
        <x-input.text name="name" label="Name" />
        <x-input.text name="email" label="Email" />
        <x-input.password name="password"/>
        <x-input.password name="password_confirmation" label="Confirm Password" />

        <x-input.multi_select name="roles[]" label="Roles">
            @foreach ($roles as $role)
                <option value="{{ $role->name }}">
                    {{ $role->name }}
                </option>
            @endforeach
        </x-input.multi_select>

        <x-button.primary>
            {{ __('Create User') }}
        </x-button.primary>
    </form>

</x-admin-layout>
