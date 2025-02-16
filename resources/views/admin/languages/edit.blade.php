<x-admin-layout>
    <x-slot name="header">
        {{ __('Languages Management') }}
    </x-slot>

    <x-slot name="subheader">
        <div>

        </div>
        {{ __('Edit languages') }}
    </x-slot>

    <x-slot name="button">
        <div>
            <form action="{{ route('admin.languages.fetchTranslations', $language->id) }}" method="POST"
                style="display:inline;">
                @csrf
                <x-button.primary>
                    {{ __('Fetch Translations') }}
                </x-button.primary>
            </form>

            <x-button.link href="{{ route('admin.languages.index') }}">Back</x-button.link>
        </div>
    </x-slot>

    <div>
        <form action="{{ route('admin.languages.update', $language->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                <x-input.text name="name" label="Name" :value="old('name', $language->name ?? '')" />
                <x-input.text name="icon" label="Icon" :value="old('icon', $language->icon ?? '')" />
            </div>


            <div class="flex items-center mb-6 space-x-4">
                <x-input.checkbox name="is_default" label="Is Default" :checked="old('is_default', $language->is_default ?? false)" />
                <x-input.checkbox name="is_enable" label="Is Enable" :checked="old('is_enable', $language->is_enable ?? false)" />
            </div>

            <div class="mb-4">
                <input type="text" id="searchInput" placeholder="Search..."
                    class="block w-full px-4 py-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500" />

            </div>


            <x-table.basic :headers="['English Word', 'Translation', 'Action']" id="translationsTable">
                <x-slot name="tbody">
                    @foreach ($translations as $key => $value)
                        <tr class="text-gray-700 dark:text-gray-400" id="row_{{ $key }}">
                            <x-table.td data="{{ $key }}" />

                            <x-table.td>
                                <x-input.text name="translations[{{ $key }}]" :value="$value" />
                            </x-table.td>

                            <x-table.td>
                                <x-button.danger type="button" class="delete-row"
                                    data-row-id="{{ $key }}">Delete</x-button.danger>
                            </x-table.td>
                        </tr>
                    @endforeach

                </x-slot>
            </x-table.basic>

            <div id="noRecords" class="hidden mt-4 text-center text-red-500">No records found</div>


            <div id="newRow" class="flex items-center space-x-4">
                <x-input.text name="newTranslationKey" placeholder="English Word" />
                <x-input.text name="newTranslationValue" placeholder="Translation" />
                <x-button.primary id="addRow" type="button">Add Row</x-button.primary>
            </div>

            <button type="submit" class="px-4 py-2 mt-4 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
                {{ __('Update') }}
            </button>
        </form>



    </div>

    @push('scripts')
        <script>
            document.getElementById('addRow').addEventListener('click', function() {
                let key = document.getElementById('newTranslationKey').value;
                let value = document.getElementById('newTranslationValue').value;
                if (key.trim() !== '' && value.trim() !== '') {
                    let newRow = document.createElement('tr');
                    newRow.className = 'text-gray-700 dark:text-gray-400'; // Matches the styling of existing rows
                    newRow.innerHTML =
                        `<td class="px-4 py-3">${key}</td>
                    <td class="px-4 py-3"><input type="text" name="translations[${key}]" value="${value}" class="block w-full mt-1 text-sm dark:border-gray-600 focus:border-purple-400 focus:shadow-outline-purple dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray form-input"></td>
                    <td class="px-4 py-3"><button type="button" class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-red-600 border border-transparent rounded-md hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 delete-row" data-row-id="${key}">Delete</button></td>`;
                    document.getElementById('translationsTable').querySelector('tbody').appendChild(newRow);
                    document.getElementById('newTranslationKey').value = '';
                    document.getElementById('newTranslationValue').value = '';
                } else {
                    alert('Please fill both fields.');
                }
            });

            document.getElementById('translationsTable').addEventListener('click', function(e) {
                if (e.target.classList.contains('delete-row')) {
                    let rowId = e.target.dataset.rowId;
                    let row = document.getElementById(`row_${rowId}`);
                    row.remove();
                }
            });

            // Search functionality
            document.getElementById('searchInput').addEventListener('input', function() {
                let searchTerm = this.value.toLowerCase();
                let rows = document.querySelectorAll('#translationsTable tbody tr');
                let noRecordsMessage = document.getElementById('noRecords');

                let visibleRows = 0; // Counter for visible rows

                rows.forEach(row => {
                    let keyCell = row.cells[0].innerText.toLowerCase();
                    let valueCell = row.cells[1].querySelector('input').value.toLowerCase();

                    if (keyCell.includes(searchTerm) || valueCell.includes(searchTerm)) {
                        row.style.display = ''; // Show the row
                        visibleRows++; // Increment the counter for visible rows
                    } else {
                        row.style.display = 'none'; // Hide the row
                    }
                });

                // Show or hide the "No records found" message
                if (visibleRows === 0) {
                    noRecordsMessage.classList.remove('hidden'); // Show message
                } else {
                    noRecordsMessage.classList.add('hidden'); // Hide message
                }
            });
        </script>
    @endpush


</x-admin-layout>
