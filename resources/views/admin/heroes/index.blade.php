<x-admin-layout>
    <x-slot name="header">
        @lang('Heroes Management')
    </x-slot>

    <x-slot name="subheader">
        @lang('All Heroes')
    </x-slot>

    <x-slot name="button">
        <x-button.link href="{{ route('admin.heroes.create') }}">@lang('Create New Hero')</x-button.link>
    </x-slot>
 <!-- شرح وظيفة الصفحة -->
 <x-alert type="info">
    <p dir="rtl">
        في هذه الصفحة يمكنك إدارة جميع ال
        <br /> Heroes الموجودة.
        <br /> يتم إنشاء كل
        Hero باستخدام قالب (template)
         مخصص موجود في مجلد
      <br />  <code>components/heroes</code>
       <br />
      . عند إنشاء Hero جديد، يمكنك اختيار القالب الذي يناسب التصميم المطلوب، وسيتم استخدامه
        في عرض بيانات الHero. يمكنك أيضاً تعديل حالة الHero (تفعيل/تعطيل) أو حذفها من خلال الخيارات المتوفرة.
    </p>
 </x-alert>

    <div class="grid grid-cols-1 gap-4 mt-5">
        @foreach ($heroes as $hero)
            <div class="border {{ $hero->status ? 'border-green-500' : 'border-red-500' }} p-4 rounded-lg">
                @if (view()->exists("components.heroes.{$hero->template_name}"))
                    @include("components.heroes.{$hero->template_name}", ['hero' => $hero])
                @else
                    <div class="text-red-500">@lang('Template not found') :  {{ $hero->template_name }}</div>
                @endif
                <p>@lang('Status') :  {{ $hero->status ? __('Active') : __( 'Inactive') }}</p>
                <div class="flex mt-4 space-x-2">
                    <a href="{{ route('admin.heroes.edit', $hero->id) }}" class="px-2 py-1 text-white transition bg-yellow-500 rounded hover:bg-yellow-600">Edit</a>
                    <form action="{{ route('admin.heroes.destroy', $hero->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-2 py-1 text-white transition bg-red-500 rounded hover:bg-red-600" onclick="return confirm('Are you sure you want to delete this hero?');">Delete</button>
                    </form>

                    <!-- Toggle Activation -->
                    <form action="{{ route('admin.heroes.toggleStatus', $hero->id) }}" method="POST" style="display: inline;">
                        @csrf
                         <button type="submit" class="{{ $hero->status ? 'bg-gray-600' : 'bg-green-500' }} text-white py-1 px-2 rounded hover:{{ $hero->status ? 'bg-green-600' : 'bg-yellow-600' }} transition">
                            {{ $hero->status ? 'Deactivate' : 'Activate' }}
                        </button>

                    </form>
                </div>
            </div>
        @endforeach
    </div>

</x-admin-layout>
