<x-admin-layout>
    <x-slot name="header">
        {{ __('Settings Management') }}
    </x-slot>

    <x-slot name="subheader">
        {{ __('All Settings') }}
    </x-slot>

    <x-slot name="button">
        <x-button.link href="{{ route('admin.settings.create') }}">Create Setting</x-button.link>
    </x-slot>

    <x-table.basic :headers="['Key', 'Value', 'Actions']">
        <x-slot name="tbody">
            @foreach ($settings as $setting)
                <tr class="text-gray-700 dark:text-gray-400">
                    <x-table.td>
                        <p>{{ $setting->key }}</p>
                        <p class="text-xs text-gray-600 dark:text-gray-400">
                            {{ $setting->desc }}
                        </p>
                    </x-table.td>
                    <x-table.td>
                        <form method="POST" action="{{ route('admin.settings.update', $setting->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="flex items-center space-x-2">
                                <x-input.text name="value" value="{{ $setting->value }}" class="flex-1" />

                                <x-button.primary>
                                    {{ __('Update') }}
                                </x-button.primary>
                            </div>
                        </form>
                    </x-table.td>

                    <x-table.td>
                        <x-button.link href="{{ route('admin.settings.edit', $setting->id) }}">Edit</x-button.link>
                    </x-table.td>
                </tr>
            @endforeach
        </x-slot>
    </x-table.basic>
</x-admin-layout>
