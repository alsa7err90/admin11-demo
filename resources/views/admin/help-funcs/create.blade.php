<x-admin-layout>
    <x-slot name="header">
        {{ __('Help Function Management') }}
    </x-slot>

    <x-slot name="subheader">
        {{ __('Create Help Function') }}
    </x-slot>

    <x-slot name="button">
        <x-button.link href="{{ route('admin.help-funcs.index') }}">Back</x-button.link>
    </x-slot>


    <form action="{{ route('admin.help-funcs.store') }}" method="POST" class="max-w-lg">
        @csrf
        @include('admin.help-funcs.form')

        <x-button.primary>
            {{ __('Create Help Function') }}
        </x-button.primary>
    </form>
</x-admin-layout>
