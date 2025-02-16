<div class="grid grid-cols-1 gap-8 lg:grid-cols-2">
    @foreach ($components as $component)
        <div x-data="{ open: false }"
            class="overflow-hidden bg-white border-2 border-gray-100 rounded-lg shadow-lg dark:bg-gray-800">
            <div class="p-6">
                <h5 class="text-lg font-bold text-gray-800 dark:text-gray-100">{{ $component->name }}</h5>
                @if ($component->can_run)
                    {{-- تنفيذ الكمبوننت وعرض النتيجة --}}
                    <div
                        class="p-4 mb-6 bg-white border-2 border-blue-300 rounded-lg shadow-md example-output dark:border-blue-600 dark:bg-gray-800">

                        <div class="component-preview">
                            {!! $component->rendered_code !!}
                        </div>
                    </div>
                @endif


                {{-- Action Buttons and Read More Toggle --}}
                <div class="flex flex-wrap gap-2 mt-6">
                    <a href="{{ route('admin.components.edit', $component) }}"
                        class="px-3 py-1 text-sm text-white bg-blue-500 rounded hover:bg-blue-600">Edit</a>
                    <form action="{{ route('admin.components.destroy', $component) }}" method="POST"
                        class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-3 py-1 text-sm text-white bg-red-500 rounded hover:bg-red-600"
                            onclick="return confirm('Are you sure you want to delete this component?')">Delete</button>
                    </form>
                    <button class="px-3 py-1 text-xs text-white bg-gray-500 rounded hover:bg-gray-600"
                        onclick="copyToClipboard(`{{ addslashes($component->code_example) }}`)">Copy Code</button>
                    <button @click="open = !open"
                        class="px-3 py-1 text-sm text-white bg-indigo-500 rounded hover:bg-indigo-600">
                        <span x-text="open ? 'Hide' : 'Read More'"></span>
                    </button>
                </div>

                {{-- Hidden Content (collapsed by default) --}}
                <div x-show="open" x-cloak class="mt-4 space-y-4 rounded-lg bg-gray-50 dark:bg-gray-700">

                    <p class="text-sm text-gray-600 dark:text-gray-300">{{ $component->description }}</p>

                    <div class="text-sm text-gray-500 dark:text-gray-400">
                        <p><span class="font-medium">Requirements:</span> {{ $component->requirements }}</p>
                        <p><span class="font-medium">Type:</span> {{ $component->type }}</p>
                    </div>

                    {{-- Source Code --}}
                    <div class="mt-4">
                        <div class="mb-2 text-sm font-semibold text-gray-600 dark:text-gray-400">Source Code:</div>
                        <pre class="p-4 overflow-x-auto bg-gray-100 rounded dark:bg-gray-600"><code class="text-sm language-php">{{ $component->code_example }}</code></pre>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
