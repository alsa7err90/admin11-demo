<a
    {{ $attributes->merge(['class' => 'inline-flex items-center px-4 py-2 bg-purple-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-purple-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:shadow-outline-purple transition ease-in-out duration-150']) }}>
    {{ $slot }}
</a>