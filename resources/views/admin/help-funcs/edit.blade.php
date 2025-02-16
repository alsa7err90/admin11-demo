<x-admin-layout>
    <x-slot name="header">
        {{ __('Helper Function Management') }}
    </x-slot>

    <x-slot name="subheader">
        {{ __('Edit Helper Function') }}
    </x-slot>

    <x-slot name="button">
        <x-button.link href="{{ route('admin.help-funcs.index') }}">Back</x-button.link>
    </x-slot>


    <form action="{{ route('admin.help-funcs.update', $helpFunc->id) }}" method="POST" class="max-w-lg">
        @csrf
        @method('PUT')

        @include('admin.help-funcs.form')

        <x-button.primary>
            {{ __('Edit Helper Function') }}
        </x-button.primary>
    </form>
</x-admin-layout>
