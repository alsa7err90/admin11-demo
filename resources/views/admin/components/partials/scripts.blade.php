@push('scripts')
<script>
    async function submitFilterForm() {
        const form = document.getElementById('filterForm');
        const formData = new FormData(form);
        const params = new URLSearchParams(formData).toString();

        // Update URL to reflect search parameters
        history.replaceState(null, '', "{{ route('admin.components.index') }}?" + params);

        // Show loading message and hide previous messages
        document.getElementById('loading-message').classList.remove('hidden');
        document.getElementById('components-list').classList.add('hidden');

        try {
            // Fetch updated component list
            const response = await fetch("{{ route('admin.components.index') }}?" + params, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });

            const html = await response.text();
            document.getElementById('loading-message').classList.add('hidden');
            document.getElementById('components-list').classList.remove('hidden');
            document.getElementById('components-list').innerHTML = html;

            // Update the Clear Filter button based on current filters
            updateClearFilterButton();
        } catch (error) {
            console.error("Error fetching components:", error);
            document.getElementById('loading-message').classList.add('hidden');
        }
    }

    async function setTypeAndSubmit(type) {
        // Update hidden type input and submit the form
        document.getElementById('typeFilter').value = type;
        await submitFilterForm();

        // Update button styles based on selection
        document.querySelectorAll('.filter-button').forEach(button => {
            if (button.getAttribute('data-type') === type) {
                button.classList.add('bg-indigo-700', 'text-white');
                button.classList.remove('bg-indigo-100', 'text-indigo-500');
            } else {
                button.classList.remove('bg-indigo-700', 'text-white');
                button.classList.add('bg-indigo-100', 'text-indigo-500');
            }
        });
    }

    async function clearFilters() {
        // Clear both search and type inputs
        document.getElementById('typeFilter').value = '';
        document.querySelector('input[name="search"]').value = '';

        // Update URL to remove search and type parameters
        history.replaceState(null, '', "{{ route('admin.components.index') }}");

        // Fetch all components
        await submitFilterForm();
    }

    function updateClearFilterButton() {
        const searchValue = document.querySelector('input[name="search"]').value;
        const typeValue = document.getElementById('typeFilter').value;
        
        const clearFilterButton = document.querySelector('#filter-buttons .clear-filter-button');

        if (searchValue || typeValue) {
            clearFilterButton.classList.remove('bg-gray-100');
            clearFilterButton.classList.add('bg-gray-300');
        } else {
            clearFilterButton.classList.remove('bg-gray-300');
            clearFilterButton.classList.add('bg-gray-100');
        }
    }

    function copyToClipboard(text) {
        var tempElement = document.createElement("textarea");
        tempElement.value = text;
        document.body.appendChild(tempElement);
        tempElement.select();
        document.execCommand("copy");
        document.body.removeChild(tempElement);
        alert('تم نسخ الكود!');
    }
</script>
@endpush
