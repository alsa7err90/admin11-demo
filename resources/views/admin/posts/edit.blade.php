<x-admin-layout>
    <x-slot name="header">
        {{ __('Post Management') }}
    </x-slot>

    <x-slot name="subheader">
        {{ __('Edit Post') }}
    </x-slot>

    <x-slot name="button">
        <x-button.link href="{{ route('admin.posts.index') }}">Back</x-button.link>
    </x-slot>

    <form method="POST" action="{{ route('admin.posts.update', $post->id) }}">
        @csrf
        @method('PUT')
        @include('admin.posts.includes.form')
    </form>
</x-admin-layout>
