<x-admin-layout>
    <x-slot name="header">
        {{ __('Languages Management') }}
    </x-slot>

    <x-slot name="subheader">
        {{ __('Create New Language') }}
    </x-slot>

    <x-slot name="button">
        <x-button.link href="{{ route('admin.languages.index') }}">Back</x-button.link>
    </x-slot>

    <form method="POST" action="{{ route('admin.languages.store') }}">
        @csrf

        <x-input.text name="code" label="Code" :value="old('code', isset($languages->code) ? $languages->code : '')" />
        <x-input.text name="name" label="Name" :value="old('name', isset($languages->name) ? $languages->name : '')" />

        <x-input.checkbox name="is_default" label="Is Default" :checked="old('is_default', isset($languages->is_default) ? $languages->is_default : false)" />

        <x-input.checkbox name="is_enable" label="Is Enable" :checked="old('is_enable', isset($languages->is_enable) ? $languages->is_enable : false)" />

        <x-input.text name="icon" label="Icon" :value="old('icon', isset($languages->icon) ? $languages->icon : '')" />

        <x-button.primary>
            {{ __('Save') }}
        </x-button.primary>
    </form>

</x-admin-layout>
