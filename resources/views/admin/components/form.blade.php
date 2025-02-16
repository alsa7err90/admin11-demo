<x-input.text name="name" label="Name" value="{{ old('name', $data->name ?? '') }}" required />

<x-input.textarea name="description" label="Description" value="{{ old('description', $data->description ?? '') }}" />

<x-input.textarea name="requirements" label="Requirements" value="{{ old('requirements', $data->requirements ?? '') }}" />

<x-input.textarea name="code_example" required label="Code Example"
    value="{{ old('code_example', $data->code_example ?? '') }}" />


<x-input.dropdown :types="$types" :selectedType="$data->type ?? ''" label="Type" />

<!-- Checkbox for Seed Option -->
<x-input.checkbox name="add_seed" :label="__('Add as Seed')" checked />
<x-input.checkbox name="can_run" :label="__('checkbox_can_run_components')" />

<div class="flex items-center gap-2 mt-4">
    <select name="can_run" class="mt-0 p-2 border border-gray-300 rounded-md w-full flex-[1]">
        <option value="0">@lang('No')</option>
        <option value="1">@lang('Yes')</option>
    </select>
    <small class="text-sm text-gray-500 flex-[11]">
        @lang('small_test_form_components')
    </small>
</div>


<script>
    function toggleDropdown() {
        document.getElementById('typeDropdown').classList.toggle('hidden');
    }

    function selectType(type) {
        document.getElementById('type').value = type;
        toggleDropdown();
    }
</script>
