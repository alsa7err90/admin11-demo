<x-admin-layout>
    <x-slot name="header">
        {{ __('Helper Functions Management') }}
    </x-slot>

    <x-slot name="subheader">
        {{ __('All Helper Functions') }}
    </x-slot>

    <x-slot name="button">
        <x-button.link href="{{ route('admin.help-funcs.create') }}">Create Helper Function</x-button.link>
    </x-slot>

    <x-alert type="info">
        <p dir="rtl">
            هذه الصفحة تعرض جميع الدوال المساعدة (Helper Functions) المتوفرة في النظام.
            الدوال المساعدة هي دوال مُعرّفة مسبقًا تُستخدم لتبسيط العمليات المتكررة وتحسين كفاءة الشيفرة البرمجية.
            يمكنك البحث عن دالة مساعدة، تصفيتها، إدارتها، أو إضافة دوال جديدة لتوسيع وظائف النظام.
        </p>
    </x-alert>
    {{-- Search and Filter Section --}}
    @if ($helpFuncs->isNotEmpty())
        @include('admin.help-funcs.partials.filter-section')
    @endif

    {{-- Helper Functions List --}}
    @include('partials.loading')

    <div id="help-funcs-list">
        @include('admin.help-funcs.partials.help-funcs-list', ['helpFuncs' => $helpFuncs])
    </div>

    @include('admin.help-funcs.partials.scripts')

</x-admin-layout>
