<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12" dir="rtl">
        <div class="bg-white p-6 rounded-lg shadow-lg">

            <h1 class="text-2xl font-bold mb-6">{{ __('Create New languages') }}</h1>

            <form action="{{ route('languages.store') }}" method="POST">
                @csrf

                
            <div class="form-group">
                <label for="code">@lang('code')</label>
                <input type="text" name="code" id="code" value="{{ old('code', isset($languages->code) ? $languages->code : '') }}" class="form-control">
            </div>
        
            <div class="form-group">
                <label for="name">@lang('name')</label>
                <input type="text" name="name" id="name" value="{{ old('name', isset($languages->name) ? $languages->name : '') }}" class="form-control">
            </div>
        
            <div class="form-group">
                <label for="is_default">@lang('is_default')</label>
                <input type="text" name="is_default" id="is_default" value="{{ old('is_default', isset($languages->is_default) ? $languages->is_default : '') }}" class="form-control">
            </div>
        
            <div class="form-group">
                <label for="is_enable">@lang('is_enable')</label>
                <input type="text" name="is_enable" id="is_enable" value="{{ old('is_enable', isset($languages->is_enable) ? $languages->is_enable : '') }}" class="form-control">
            </div>
        
            <div class="form-group">
                <label for="icon">@lang('icon')</label>
                <input type="text" name="icon" id="icon" value="{{ old('icon', isset($languages->icon) ? $languages->icon : '') }}" class="form-control">
            </div>
        

                <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">
                    {{ __('Save') }}
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
