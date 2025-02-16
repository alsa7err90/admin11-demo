<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Permissions Management') }}
        </h2>
    </x-slot>
    <div class="container">
        <h1>Edit Permission</h1>

        <form method="POST" action="{{ route('admin.permissions.update', $permission->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Permission Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $permission->name }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Permission</button>
        </form>
    </div>

</x-admin-layout>
