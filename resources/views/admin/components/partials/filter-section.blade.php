<div class="flex items-center justify-between mb-6">
    <!-- Search Form -->
    <form id="filterForm" action="{{ route('admin.components.index') }}" method="GET"
        class="flex items-center space-x-2">
        <x-input.text name="search" placeholder="Search by name..." value="{{ request('search') }}" oninput="submitFilterForm()"  />
        <input type="hidden" name="type" id="typeFilter" value="{{ request('type') }}">
    </form>

    <!-- Filter by Type -->
    <div id="filter-buttons" class="flex space-x-2">
        @foreach ($types as $type)
            <button onclick="setTypeAndSubmit('{{ $type }}')"
                class="filter-button px-3 py-1 text-sm font-semibold rounded
                {{ request('type') === $type ? 'bg-indigo-700 text-white' : 'bg-indigo-100 text-indigo-500 hover:bg-indigo-200' }}"
                data-type="{{ $type }}">
                {{ $type }}
            </button>
        @endforeach

        <!-- Clear Filter -->
        <button onclick="clearFilters()"
            class="px-3 py-1 text-sm font-semibold text-gray-600 bg-gray-100 border-0 rounded clear-filter-button hover:bg-gray-300">
            Clear Filter
        </button>
    </div>
</div>
