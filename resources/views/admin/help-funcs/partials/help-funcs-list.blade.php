<div class="grid grid-cols-1 gap-8 lg:grid-cols-2">
    @foreach ($helpFuncs as $helpFunc)
        <div x-data="{ open: false }"
            class="overflow-hidden bg-white border-2 border-gray-100 rounded-lg shadow-lg dark:bg-gray-800">
            <div class="p-6">
                <h5 class="text-lg font-bold text-gray-800 dark:text-gray-100">{{ $helpFunc->name }}</h5>

                {{-- تنفيذ الفنكشن وعرض النتيجة --}}
                <div
                    class="p-4 mb-6 bg-white border-2 border-blue-300 rounded-lg shadow-md example-output dark:border-blue-600 dark:bg-gray-800">
                    <div class="mb-2 text-sm font-semibold text-gray-600 dark:text-gray-400">نتيجة التنفيذ:</div>
                    <div class="text-sm text-gray-700 dark:text-gray-400">
                        {!! executeCode($helpFunc->code_example) !!}
                    </div>
                </div>

                {{-- Action Buttons and Read More Toggle --}}
                <div class="flex flex-wrap gap-2 mt-6">
                    <a href="{{ route('admin.help-funcs.edit', $helpFunc) }}"
                        class="px-3 py-1 text-sm text-white bg-blue-500 rounded hover:bg-blue-600">تعديل</a>
                    <form action="{{ route('admin.help-funcs.destroy', $helpFunc) }}" method="POST"
                        class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-3 py-1 text-sm text-white bg-red-500 rounded hover:bg-red-600"
                            onclick="return confirm('هل أنت متأكد من الحذف؟')">حذف</button>
                    </form>
                    <button onclick="copyToClipboard(`{{ addslashes($helpFunc->code_example) }}`)"
                        class="px-3 py-1 text-xs text-white bg-gray-500 rounded hover:bg-gray-600">نسخ الكود</button>
                    <button @click="open = !open"
                        class="px-3 py-1 text-sm text-white bg-indigo-500 rounded hover:bg-indigo-600">
                        <span x-text="open ? 'إخفاء' : 'المزيد'"></span>
                    </button>
                </div>

                {{-- Collapsible Content --}}
                <div x-show="open" x-cloak class="p-4 mt-4 space-y-4 rounded-lg bg-gray-50 dark:bg-gray-700">
                    {{-- Function Name --}}

                    {{-- Description --}}
                    <p class="text-sm text-gray-600 dark:text-gray-300">{{ $helpFunc->description }}</p>


                    {{-- Additional Information --}}
                    <p class="text-xs text-gray-500 dark:text-gray-400">
                        <span class="font-medium">الملف:</span> {{ $helpFunc->file_name }}
                    </p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">
                        <span class="font-medium">النوع:</span> {{ $helpFunc->type }}
                    </p>

                    {{-- Source Code --}}
                    <div class="mt-4">
                        <div class="mb-2 text-sm font-semibold text-gray-600 dark:text-gray-400">كود الفنكشن:</div><pre class="p-4 overflow-x-auto bg-gray-100 rounded dark:bg-gray-600"><code class="text-sm language-php">{{ $helpFunc->code_example }}</code></pre>
                    </div>

                </div>
            </div>
        </div>
    @endforeach
</div>
