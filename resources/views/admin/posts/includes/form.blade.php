<x-input.text name="title" label="Title" :value="$post->title ?? ''" />

    <x-input.textarea name="content" label="Content" :value="$post->content ?? ''" />

        <x-input.select name="user_id" label="Select User">
            @foreach ($users as $user)
                <option value="{{ $user->id }}" {{ (isset($post) && $post->user_id == $user->id) ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
            @endforeach
        </x-input.select>

<x-button.primary type='submit'>
    {{ __('Save') }}
</x-button.primary>