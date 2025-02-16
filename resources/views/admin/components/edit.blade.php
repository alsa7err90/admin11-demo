<x-admin-layout>
    <x-slot name="header">
        {{ __('Components Management') }}
    </x-slot>

    <x-slot name="subheader">
        {{ __('Edit Component') }}
    </x-slot>


    <x-slot name="button">
        <x-button.link href="{{ route('admin.components.index') }}">Back</x-button.link>
    </x-slot>

    <form action="{{ route('admin.components.update', $data->id) }}" method="POST">
        @csrf
        @method('PUT')

        @include('admin.components.form')

        <x-button.primary>
            {{ __('Edit Component') }}
        </x-button.primary>
    </form>

</x-admin-layout>
