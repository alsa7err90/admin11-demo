<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12" dir="rtl">
        <div class="bg-white p-6 rounded-lg shadow-lg">

            <h1 class="text-2xl font-bold mb-6">{{ __('List of ') . __('languages') }}</h1>

            <a href="{{ route('languages.create') }}"
               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                {{ __('Create New') }}
            </a>

            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg mt-6">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                @lang('id')
                            </th>
                            
                   <th>@lang('code')</th>
                   <th>@lang('name')</th>
                   <th>@lang('is_default')</th>
                   <th>@lang('is_enable')</th>
                   <th>@lang('icon')</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                @lang('Actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($data as $languagesItem)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-right">
                                    {{ $languagesItem->id }}
                                </td>
                                
                   <td>{{ $languagesItem->code }}</td>
                   <td>{{ $languagesItem->name }}</td>
                   <td>{{ $languagesItem->is_default }}</td>
                   <td>{{ $languagesItem->is_enable }}</td>
                   <td>{{ $languagesItem->icon }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right">
                                    <div class="flex space-x-2 justify-end">
                                        <a href="{{ route('languages.edit', $languagesItem) }}"
                                           class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">
                                            @lang('Edit')
                                        </a>
                                        <form action="{{ route('languages.destroy', $languagesItem) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">
                                                @lang('Delete')
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>
