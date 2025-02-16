<x-input.text name="name" label="Function Name" :value="$helpFunc->name ?? ''" required />

<x-input.textarea name="description" label="Description" :value="$helpFunc->description ?? ''" />

<x-input.textarea name="code_example" label="Code Example" :value="$helpFunc->code_example ?? ''" />

<x-input.text name="file_name" label="File Name" :value="$helpFunc->file_name ?? ''" required />

<x-input.dropdown :types="$types" :selectedType="$helpFunc->type ?? ''" label="Type" />

<!-- Checkbox for Seed Option -->
<x-input.checkbox name="add_seed" :label="__('Add as Seed')" checked />

<div class="flex items-center gap-2 mt-4">
    <select name="can_run" class="mt-0 p-2 border border-gray-300 rounded-md w-full flex-[1]">
        <option value="0">@lang('No')</option>
        <option value="1">@lang('Yes')</option>
    </select>
    <small class="text-sm text-gray-500 flex-[11]">
        @lang('small_text_form_help_funcs')
    </small>
</div>
