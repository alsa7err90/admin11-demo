<x-admin-layout>
    <x-slot name="header">
        {{ __('Components Management') }}
    </x-slot>

    <x-slot name="subheader">
        {{ __('Create Component or Partials') }}
    </x-slot>


    <x-slot name="button">
        <x-button.link href="{{ route('admin.components.index') }}">@lang('Back')</x-button.link>
    </x-slot>

    <form action="{{ route('admin.components.store') }}" method="POST">
        @csrf
        @include('admin.components.form')

        <x-button.primary>
            {{ __('Create Component') }}
        </x-button.primary>
    </form>

</x-admin-layout>
