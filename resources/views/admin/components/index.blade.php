<x-admin-layout>
    <x-slot name="header">
        {{ __('Components Management') }}
    </x-slot>

    <x-slot name="subheader">
        {{ __('All Components and Partials') }}
    </x-slot>

    <x-slot name="button">
        <x-button.link href="{{ route('admin.components.create') }}">Create Component</x-button.link>
    </x-slot>

    <x-alert type="info">
        <p dir="rtl">
            هذه الصفحة تعرض جميع المكونات  <br />
            (Components)   (Partials) <br />
             المتوفرة في النظام.
            يمكنك استخدامها لإعادة استخدام أجزاء الواجهة البرمجية بسهولة وتحسين
            <br /> تنظيم الشيفرة البرمجية.
            يمكنك البحث، تصفية، وإدارة المكونات، بالإضافة إلى
            <br /> إضافة مكونات جديدة أو تعديل المكونات الحالية.
        </p>
    </x-alert>
    {{-- Search and Filter Section --}}
    @if ($components->isNotEmpty())
        @include('admin.components.partials.filter-section')
    @endif

    {{-- Components List --}}
    @include('partials.loading')

    <div id="components-list">
        @include('admin.components.partials.components-list', ['components' => $components])
    </div>

    @include('admin.components.partials.scripts')

</x-admin-layout>
