<x-admin-layout>
    <x-slot name="header">
        {{ __('User Management') }}
    </x-slot>

    <x-slot name="subheader">
        {{ __('All Users') }}
    </x-slot>

    <x-slot name="button">
        <x-button.link href="{{ route('admin.users.create') }}">Create User</x-button.link>
    </x-slot>

    <x-table.basic :headers="['Name', 'Email', 'Roles', 'Referral Code', 'Actions']">
        <x-slot name="tbody">
            @foreach ($users as $user)
                <tr class="text-gray-700 dark:text-gray-400">
                    <x-table.td data="{{ $user->name }}" />
                    <x-table.td data="{{ $user->email }}" />
                    <x-table.td data="{{ $user->getRoleNames()->implode(', ') }}" />
                    <x-table.td data="{{ $user->referral_code ?? '' }}" />
                    <x-table.td>
                        <x-button.link href="{{ route('admin.users.edit', $user->id) }}">Edit Roles</x-button.link>
                    </x-table.td>
                </tr>
            @endforeach
        </x-slot>
    </x-table.basic>
</x-admin-layout>
