<form action="{{ $action }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')

    <x-button.danger >
        {{ __('Delete') }}
    </x-button.danger>

</form>
