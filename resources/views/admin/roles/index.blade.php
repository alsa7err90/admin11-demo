<x-admin-layout>
    <x-slot name="header">
        {{ __('Roles Management') }}
    </x-slot>

    <x-slot name="subheader">
        {{ __('All Roles') }}
    </x-slot>


    <x-slot name="button">
        <x-button.link href="{{ route('admin.roles.create') }}">Create Role</x-button.link>
    </x-slot>

    <x-table.basic :headers="['Name', 'Actions']">
        <x-slot name="tbody">
            @foreach ($roles as $role)
                <tr>
                    <x-table.td data="{{ $role->name }}" />

                    <x-table.td>

                        <x-button.link href="{{ route('admin.roles.edit', $role->id) }}">Edit</x-button.link>
                        <x-button.delete action="{{ route('admin.roles.destroy', $role->id) }}" />

                    </x-table.td>

                </tr>
            @endforeach
        </x-slot>
    </x-table.basic>
</x-admin-layout>
