<td class="px-4 py-3 text-sm">

    @if (isset($data))
        {{ $data }}
    @else
        {{ $slot }}
    @endif

</td>
