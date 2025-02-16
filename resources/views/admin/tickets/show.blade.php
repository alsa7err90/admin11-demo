<x-admin-layout>
    <x-slot name="header">
        {{ __('Ticket Details') }}
    </x-slot>

    <x-slot name="subheader">
        {{ __('Details for Ticket #') }} {{ $ticket->id }}
    </x-slot>

    <div class="mt-4">
        <h3 class="font-semibold">{{ $ticket->title }}</h3>
        <p>{{ $ticket->content }}</p>
        <p>Status: {{ $ticket->status }}</p>
        <p>Department: {{ $ticket->department->name ?? 'N/A' }}</p>
        <p>Label: {{ $ticket->label->name ?? 'N/A' }}</p>
        <p>Priority: {{ $ticket->priority }}</p>

        <h4 class="mt-4 font-semibold">{{ __('Change Ticket Status') }}</h4>
        <form action="{{ route('admin.tickets.updateStatus', $ticket->id) }}" method="POST" class="mt-4">
            @csrf
            @method('PUT') <!-- تأكد من أنك تستخدم الطريقة الصحيحة -->

            <div>
                <label for="status" class="block font-medium text-sm text-gray-700">Status</label>
                <select name="status" id="status" class="form-select mt-1 block w-full" required>
                    @foreach (App\Enums\TicketStatus::cases() as $status)
                        <option value="{{ $status->value }}"
                            {{ $ticket->status === $status->value ? 'selected' : '' }}>
                            {{ $status->label() }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex justify-end mt-4">
                <button type="submit">Update Status</button>
            </div>
        </form>

        <h4 class="mt-4 font-semibold">{{ __('Comments') }}</h4>
        <div class="mt-2">
            @foreach ($ticket->comments as $comment)
                <div class="border-b border-gray-200 py-2">
                    <p><strong>{{ $comment->user->name }}</strong>: {{ $comment->comment }}</p>
                    <p class="text-gray-600">{{ $comment->created_at->diffForHumans() }}</p>
                </div>
            @endforeach
        </div>

        <form action="{{ route('admin.tickets.addComment', $ticket->id) }}" method="POST" class="mt-4">
            @csrf
            <div>
                <textarea name="comment" rows="3" class="form-textarea mt-1 block w-full" required placeholder="Add a comment..."></textarea>
            </div>
            <button type="submit" class="mt-2">Add Comment</button>
        </form>
    </div>
</x-admin-layout>
