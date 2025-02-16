<x-admin-layout>
    <x-slot name="header">
        {{ __('Model Relationships Analysis') }}
    </x-slot>

    <x-slot name="subheader">
        {{ __('Model Relationships Analysis') }}
    </x-slot>
    <div class="container">

        <x-table.basic :headers="['Model', 'Relationships']">
            <x-slot name="tbody">

                @foreach ($relationships as $model => $relations)
                    <tr class="text-gray-700 dark:text-gray-400">
                        <x-table.td>{{ $model }}</x-table.td>
                        <x-table.td>{{ implode(', ', $relations) }}</x-table.td>
                    </tr>
                @endforeach
            </x-slot>
        </x-table.basic>
    </div>
</x-admin-layout>
