<x-admin-layout>
    <x-slot name="header">
        {{ __('Tickets Management') }}
    </x-slot>

    <x-slot name="subheader">
        {{ __('All Tickets') }}
    </x-slot>

    <x-slot name="button">
        <x-button.link href="{{ route('admin.tickets.create') }}">Create New Ticket</x-button.link>
    </x-slot>

    <div class="mt-4">
        @foreach ($tickets as $item)
            <div class="border-b border-gray-200 py-2">
                <h3 class="font-semibold">
                    <a href="{{ route('admin.tickets.show', $item->id) }}">{{ $item->title }}</a>
                </h3>
                <p>{{ $item->content }}</p>
                <p>Status: {{ $item->status }}</p>
                <p>Department ID: {{ $item->department_id }}</p>
                <p>Label ID: {{ $item->label_id }}</p>
                <p>Priority: {{ $item->priority }}</p>
            </div>
        @endforeach
    </div>

    <div class="mt-4">
        {{ $tickets->links() }} <!-- لتحميل الصفحات -->
    </div>
</x-admin-layout>
