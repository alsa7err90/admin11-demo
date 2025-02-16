@props(['headers'])

<div class="w-full overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto">
        <table {{ $attributes->merge(['class' => 'w-full']) }}>
            <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">

                    @if (isset($headers))
                        @foreach ($headers as $item)
                            <th>@lang($item)</th>
                        @endforeach
                    @else
                        {{ $thead ?? '' }}
                    @endif
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                {{ $tbody }}
            </tbody>
        </table>
    </div>
</div>
