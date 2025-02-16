<div class="mb-4">
    <label for="type" class="block mb-2 text-gray-700 mt-4 text-sm">@lang($label)</label>
    <div class="relative">
        <input type="text" name="type" id="type"
            class="w-full px-4 py-2 text-gray-700 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"
            value="{{ old('type', $selectedType) }}" placeholder="Select a type" required>
        <button type="button"
            class="absolute top-0 right-0 flex items-center justify-center w-10 h-full text-gray-500 hover:text-gray-700"
            onclick="toggleDropdown()">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </button>
        <ul id="typeDropdown"
            class="absolute left-0 right-0 z-10 hidden mt-2 bg-white border border-gray-200 rounded-lg shadow-lg">
            @foreach ($types as $type)
                <li class="px-4 py-2 text-gray-700 cursor-pointer hover:bg-indigo-500 hover:text-white"
                    onclick="selectType('{{ $type }}')">
                    {{ $type }}
                </li>
            @endforeach
        </ul>
    </div>
</div>

<script>
    function toggleDropdown() {
        document.getElementById('typeDropdown').classList.toggle('hidden');
    }

    function selectType(type) {
        document.getElementById('type').value = type;
        toggleDropdown();
    }

    // Close dropdown if clicked outside
    document.addEventListener('click', function(event) {
        const dropdown = document.getElementById('typeDropdown');
        const button = event.target.closest('button');
        if (!dropdown.contains(event.target) && !button) {
            dropdown.classList.add('hidden');
        }
    });
</script>
