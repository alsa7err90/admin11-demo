@props(['label'])

<label class="block mt-4 text-sm">
    <span class="text-gray-700 dark:text-gray-400">{{ $label ?? "Password" }}</span>
    <input
        {{ $attributes->merge([
            'class' => 'block w-full mt-1 text-sm ' .
            ($errors->has($attributes['name']) ? 'border-red-600 focus:border-red-400 focus:shadow-outline-red' : 'dark:border-gray-600 focus:border-purple-400 focus:shadow-outline-purple') .
            ' dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray form-input'
        ]) }}
        placeholder="***************" type="password"
    />
    
    @if ($errors->has($attributes['name']))
        <span class="text-xs text-red-600 dark:text-red-400">
            {{ $errors->first($attributes['name']) }}
        </span>
    @endif
</label>
