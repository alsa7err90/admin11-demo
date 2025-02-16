<x-admin-layout>
    <x-slot name="header">
        {{ __('Edit Hero') }}
    </x-slot>

    <x-slot name="subheader">
        {{ __('Update Hero') }}
    </x-slot>

    <x-slot name="button">
        <x-button.link href="{{ route('admin.heroes.index') }}">Back</x-button.link>
    </x-slot>

    <div class="container mx-auto">
        <form action="{{ route('admin.heroes.update', $hero->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <x-input.text name="title" label="Title" :value="$hero->title" required />
            <x-input.textarea name="description" label="Description" :value="$hero->description" />
            <x-input.image name="image" label="Image" />
            @if ($hero->image)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $hero->image) }}" alt="Current Image" class="max-w-xs">
                </div>
            @endif
            <x-input.text name="button_label" label="Button Label" :value="$hero->button_label" />
            <x-input.text name="button_link" label="Button Link" :value="$hero->button_link" />
            <x-input.text name="video_link" label="Video Link" :value="$hero->video_link" />
            <x-input.text name="second_button_label" label="Second Button Label" :value="$hero->second_button_label" />
            <x-input.text name="second_button_link" label="Second Button Link" :value="$hero->second_button_link" />
            <x-input.text name="expires_at" label="Expires At" type="datetime-local" :value="optional($hero->expires_at)->format('Y-m-d\TH:i')" />
            <x-input.text name="template_name" label="Template" :value="$hero->template_name" />

            <x-button.primary type="submit" label="Update Hero" />
        </form>
    </div>
</x-admin-layout>
