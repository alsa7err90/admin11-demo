<x-admin-layout>
    <x-slot name="header">
        {{ __('Permissions Management') }}
    </x-slot>

    <x-slot name="subheader">
        {{ __('Create Permission') }}
    </x-slot>

    <x-slot name="button">
        <x-button.link href="{{ route('admin.permissions.index') }}">Back</x-button.link>
    </x-slot>

    <form method="POST" action="{{ route('admin.permissions.store') }}">
        @csrf
        <x-input.text name="name" required label="Name" />

        <x-button.primary type='submit'>
            {{ __('Create Permission') }}
        </x-button.primary>
    </form>
</x-admin-layout>
