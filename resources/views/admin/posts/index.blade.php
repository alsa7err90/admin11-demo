<x-admin-layout>
    <x-slot name="header">
        {{ __('Post Management') }}
    </x-slot>

    <x-slot name="subheader">
        {{ __('All Posts') }}
    </x-slot>

    <x-slot name="button">
        <x-button.link href="{{ route('admin.posts.create') }}">Create Post</x-button.link>
    </x-slot>

    <x-table.basic :headers="['Title', 'User', 'Actions']">
        <x-slot name="tbody">
            @foreach ($posts as $post)
                <tr>
                    <x-table.td data="{{ $post->title }}" />
                    <x-table.td data="{{ $post->user->name }}" />
                    <x-table.td>
                        <x-button.link href="{{ route('admin.posts.edit', $post->id) }}">Edit</x-button.link>
                        <x-button.delete action="{{ route('admin.posts.destroy', $post->id) }}" />
                    </x-table.td>
                </tr>
            @endforeach
        </x-slot>
    </x-table.basic>
</x-admin-layout>
