<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('setting Management') }}
        </h2>
    </x-slot>
    <div class="sm:px-6 lg:px-8 py-12" >
        <div class="bg-white p-6 rounded-lg shadow-lg">

            <h1 class="text-2xl font-bold mb-6">{{ __('View languages') }}</h1>

            <div class="mb-4">
                <div class="bg-gray-100 p-4 rounded-md shadow">
                    
            <p><strong>@lang('code'): </strong>{{ $languages->code }}</p>
        
            <p><strong>@lang('name'): </strong>{{ $languages->name }}</p>
        
            <p><strong>@lang('is_default'): </strong>{{ $languages->is_default }}</p>
        
            <p><strong>@lang('is_enable'): </strong>{{ $languages->is_enable }}</p>
        
            <p><strong>@lang('icon'): </strong>{{ $languages->icon }}</p>
        
                </div>
            </div>

            <a href="{{ route('admin.languages.edit', $languages->id) }}"
                class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                {{ __('Edit') }}
            </a>
        </div>
    </div>
</x-admin-layout>
