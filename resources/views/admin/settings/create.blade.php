<x-admin-layout>
    <x-slot name="header">
        {{ __('Settings Management') }}
    </x-slot>

    <x-slot name="subheader">
        {{ __('Add New Setting') }}
    </x-slot>

    <x-slot name="button">
        <x-button.link href="{{ route('admin.settings.index') }}">Back</x-button.link>
    </x-slot>

    <form method="POST" action="{{ route('admin.settings.store') }}">
        @csrf

        <x-input.text name="key" label="Key" />
        <x-input.text name="value" label="Value" />
        <x-input.text name="desc" label="Description" />
        <x-input.text name="category" label="Category" />
        <!-- Checkbox for Seed Option -->
        <x-input.checkbox name="add_seed" label="Add as Seed" checked />

        <x-button.primary>
            {{ __('Add Setting') }}
        </x-button.primary>
    </form>
</x-admin-layout>
