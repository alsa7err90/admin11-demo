<x-admin-layout>
    <x-slot name="header">
        {{ __('Permissions Management') }}
    </x-slot>

    <x-slot name="subheader">
        {{ __('All Permissions') }}
    </x-slot>

    <x-slot name="button">
        <x-button.link href="{{ route('admin.permissions.create') }}">Create Permission</x-button.link>
    </x-slot>

    <x-table.basic :headers="['Name', 'Actions']">
        <x-slot name="tbody">
            @foreach ($permissions as $permission)
                <tr class="text-gray-700 dark:text-gray-400">
                    <x-table.td data="{{ $permission->name }}" />
                    <x-table.td>
                        <x-button.delete action="{{ route('admin.permissions.destroy', $permission->id) }}" />
                    </x-table.td>
                </tr>
            @endforeach
        </x-slot>
    </x-table.basic>
</x-admin-layout>
