<x-admin-layout>
    <x-slot name="header">
        {{ __('Create New Ticket') }}
    </x-slot>

    <x-slot name="subheader">
        {{ __('Fill in the details to create a new ticket.') }}
    </x-slot>

    <form action="{{ route('admin.tickets.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="user_id" class="block font-medium text-sm text-gray-700">User</label>
            <select name="user_id" id="user_id" class="form-select mt-1 block w-full" required>
                <option value="">Select User</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="title" class="block font-medium text-sm text-gray-700">Title</label>
            <input type="text" name="title" id="title" class="form-input mt-1 block w-full" required>
        </div>

        <div>
            <label for="content" class="block font-medium text-sm text-gray-700">Content</label>
            <textarea name="content" id="content" rows="4" class="form-textarea mt-1 block w-full" required></textarea>
        </div>

        <div>
            <label for="department_id" class="block font-medium text-sm text-gray-700">Department</label>
            <select name="department_id" id="department_id" class="form-select mt-1 block w-full">
                <option value="">Select Department</option>
                @foreach($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="priority" class="block font-medium text-sm text-gray-700">Priority</label>
            <select name="priority" id="priority" class="form-select mt-1 block w-full" required>
                @foreach(\App\Enums\TicketPriority::cases() as $priority)
                    <option value="{{ $priority->value }}" {{ $priority === \App\Enums\TicketPriority::Medium ? 'selected' : '' }}>
                        {{ $priority->label() }}
                    </option>
                @endforeach
            </select>
        </div>


        <div>
            <label for="label_id" class="block font-medium text-sm text-gray-700">Label</label>
            <select name="label_id" id="label_id" class="form-select mt-1 block w-full">
                <option value="">Select Label</option>
                @foreach($labels as $label)
                    <option value="{{ $label->id }}">{{ $label->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex justify-end">
            <button type="submit">Create Ticket</button>
        </div>
    </form>
</x-admin-layout>
