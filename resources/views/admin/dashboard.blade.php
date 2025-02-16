<!-- resources/views/admin/dashboard.blade.php -->

<x-admin-layout>
    <x-slot name="header">
        {{ __('Admin Dashboard') }}
    </x-slot>
    <div class="hero-section">
        @foreach ($heroes as $hero)
            @if (view()->exists("components.heroes.{$hero->template_name}"))
                @include("components.heroes.{$hero->template_name}", ['hero' => $hero])
            @else
                <div class="text-red-500">Template not found: {{ $hero->template_name }}</div>
            @endif
        @endforeach
    </div>
</x-admin-layout>
