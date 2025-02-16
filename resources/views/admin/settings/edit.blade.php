<x-admin-layout>
    <x-slot name="header">
        {{ __('Settings Management') }}
    </x-slot>

    <x-slot name="subheader">
        {{ __('Edit Setting') }}
    </x-slot>

    <x-slot name="button">
        <x-button.link href="{{ route('admin.settings.index') }}">Back</x-button.link>
    </x-slot>

    <form method="POST" action="{{ route('admin.settings.update', $setting->id) }}">
        @csrf
        @method('PUT')

        <x-input.text name="key" label="Key" value="{{ $setting->key }}" />
        <x-input.text name="value" label="Value" value="{{ $setting->value }}" />
        <x-input.text name="desc" label="Description" value="{{ $setting->desc }}" />
        <x-input.text name="category" label="Category" value="{{ $setting->category }}" />

        <x-button.primary>
            {{ __('Update Setting') }}
        </x-button.primary>
    </form>
</x-admin-layout>
