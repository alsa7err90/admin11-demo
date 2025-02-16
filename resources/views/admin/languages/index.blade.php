<x-admin-layout>
    <x-slot name="header">
        {{ __('Languages Management') }}
    </x-slot>

    <x-slot name="subheader">
        {{ __('All Languages') }}
    </x-slot>

    <x-slot name="button">
        <x-button.link href="{{ route('admin.languages.create') }}">Create New Language</x-button.link>
    </x-slot>

    <x-table.basic :headers="['ID', 'Code', 'Name', 'Is Default', 'Is Enable', 'Icon', 'Actions']">
        <x-slot name="tbody">
            @foreach ($data as $languagesItem)
                <tr class="text-gray-700 dark:text-gray-400">
                    <x-table.td data="{{ $languagesItem->id }}" />
                    <x-table.td data="{{ $languagesItem->code }}" />
                    <x-table.td data="{{ $languagesItem->name }}" />
                    <x-table.td data="{{ $languagesItem->is_default }}" />
                    <x-table.td data="{{ $languagesItem->is_enable }}" />
                    <x-table.td data="{{ $languagesItem->icon }}" />

                    <x-table.td>
                        <div class="flex items-center justify-end space-x-2">
                            <x-button.link href="{{ route('admin.languages.edit', $languagesItem) }}">
                                @lang('Edit')
                            </x-button.link>
                            @if (!$languagesItem->is_default)
                                <form action="{{ route('admin.languages.setDefault', $languagesItem) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <x-button.primary type="submit" class="!mt-0">
                                        @lang('Set as Default')
                                    </x-button.primary>
                                </form>
                            @endif
                            <form action="{{ route('admin.languages.destroy', $languagesItem) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <x-button.danger type="submit">
                                    @lang('Delete')
                                </x-button.danger>
                            </form>
                        </div>
                    </x-table.td>
                </tr>
            @endforeach
        </x-slot>
    </x-table.basic>
</x-admin-layout>
