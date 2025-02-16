<x-admin-layout>
    <x-slot name="header">
        {{ __('Add New Hero') }}
    </x-slot>

    <x-slot name="subheader">
        {{ __('Create Hero') }}
    </x-slot>

    <x-slot name="button">
        <x-button.link href="{{ route('admin.heroes.index') }}">Back</x-button.link>
    </x-slot>

    <div class="container mx-auto">
        <form action="{{ route('admin.heroes.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <x-input.text name="title" label="Title" required />
            <x-input.textarea name="description" label="Description" />
            <x-input.image name="image" label="Image" />
            <x-input.text name="button_label" label="Button Label" />
            <x-input.text name="button_link" label="Button Link" />
            <x-input.text name="video_link" label="Video Link" />
            <x-input.text name="second_button_label" label="Second Button Label" />
            <x-input.text name="second_button_link" label="Second Button Link" />
            <x-input.text name="expires_at" label="Expires At" type="datetime-local" />
            <x-input.text name="template_name" label="Template" />

            <x-button.primary type="submit" label="Add Hero" />
            
        </form>
    </div>
</x-admin-layout>
