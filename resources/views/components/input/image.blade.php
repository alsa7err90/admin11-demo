@props(['label', 'required' => false, 'name', 'id' => null])

<label class="block mt-4 text-sm">
    @isset($label)
        <span class="text-gray-700 dark:text-gray-400">{{ $label }}
            @if ($required)
                <span class="text-red-500">*</span>
            @endif
        </span>
    @endisset

    <div class="mt-2">
        <input
            type="file"
            name="{{ $name }}"
            id="{{ $id ?? $name }}"
            accept="image/*"
            {{ $attributes->merge([
                'class' =>
                    'block w-full text-sm ' .
                    ($errors->has($name)
                        ? 'border-red-600 focus:border-red-400 focus:shadow-outline-red'
                        : 'dark:border-gray-600 focus:border-purple-400 focus:shadow-outline-purple') .
                    ' dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray form-input',
            ]) }}
            onchange="previewImage(event)"
        />

        {{-- Image Preview --}}
        <div class="mt-2">
            <img id="imagePreview" src="" alt="Image preview" class="hidden object-cover w-32 h-32 border border-gray-200 rounded-md dark:border-gray-600">
        </div>
    </div>

    @if ($errors->has($name))
        <span class="text-xs text-red-600 dark:text-red-400">
            {{ $errors->first($name) }}
        </span>
    @endif
</label>

{{-- Image Preview Script --}}
<script>
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('imagePreview');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
