@props(['label', 'required', 'name', 'id' => null])

<label class="block mt-4 text-sm">
    @isset($label)
        <span class="text-gray-700 dark:text-gray-400">{{ $label }}
            @if (isset($required))
                <span class="text-red-500">*</span>
            @endif
        </span>
    @endisset

    <select name="{{ $name }}" id="{{ $id ?? $name }}"
        {{ $attributes->merge([
            'class' =>
                'block w-full mt-1 text-sm ' .
                ($errors->has($name)
                    ? 'border-red-600 focus:border-red-400 focus:shadow-outline-red'
                    : 'dark:border-gray-600 focus:border-purple-400 focus:shadow-outline-purple') .
                ' dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray form-select',
        ]) }}>
        {{ $slot }}
    </select>

    @if ($errors->has($name))
        <span class="text-xs text-red-600 dark:text-red-400">
            {{ $errors->first($name) }}
        </span>
    @endif
</label>
