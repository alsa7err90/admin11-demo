@props(['label', 'checked' => false])

<label class="block mt-4 text-sm">
    <input
        type="checkbox"
        name="{{ $attributes['name'] }}"
        {{ $attributes->merge([
            'class' =>
                'text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray' .

                ($errors->has($attributes['name']) ? ' border-red-600 focus:border-red-400 focus:shadow-outline-red' : ''),
            'checked' => $checked ?? false  // افتراضياً false

        ]) }}
        {{ old($attributes['name'], $checked) ? 'checked' : '' }}
    />

    <span class="ml-2">
        {{ $label }}
    </span>

    @if ($errors->has($attributes['name']))
        <span class="text-xs text-red-600 dark:text-red-400">
            {{ $errors->first($attributes['name']) }}
        </span>
    @endif
</label>
