{{-- resources/views/admin/archive.blade.php --}}
<x-admin-layout>
    <x-slot name="header">
        {{ __('Archive Management') }}
    </x-slot>

    <x-slot name="subheader">
        {{ __('Create New Archive') }}
    </x-slot>
    <!-- شرح وظيفة الصفحة للمستخدم -->
    <x-alert type="info">
        <p dir="rtl">
            في هذه الصفحة يمكنك أرشفة بيانات جدول محدد. يمكنك اختيار الجدول المطلوب من القائمة،
            وتحديد فترة زمنية (من تاريخ إلى تاريخ) أو أرشفة البيانات قبل تاريخ معين.
            عند تنفيذ العملية، سيتم إنشاء جدول أرشيف جديد يحتوي على البيانات المطابقة للشروط التي تم اختيارها.
        </p>
    </x-alert>
    <form method="POST" action="{{ route('admin.archive.store') }}">
        @csrf

        <x-input.select name="table" label="اختر الجدول">
            @foreach ($models as $model)
                    <option value="{{ $model['table'] }}">{{ $model['model'] }}</option>
            @endforeach
        </x-input.select>

        <x-input.date name="from_date" label="التاريخ من" />
        <x-input.date name="to_date" label="التاريخ إلى" />
        <x-input.date name="before_date" label="أو أرشفة قبل تاريخ معين" />

        <x-button.primary>
            {{ __('أرشف البيانات') }}
        </x-button.primary>
    </form>

</x-admin-layout>
