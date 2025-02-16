<div class="hero-type-2">
    <h2 class="text-xl font-bold">{{ $hero->title }}</h2>
    <p>{{ $hero->description }}</p>
    <img src="{{ asset('storage/' . $hero->image) }}" width="100" alt="{{ $hero->title }}" class="  h-auto">
    <a href="{{ $hero->button_link }}" class="btn btn-secondary">{{ $hero->button_label }}</a>
</div>
