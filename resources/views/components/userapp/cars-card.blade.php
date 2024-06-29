@props(['image', 'title', 'description', 'price'])

<div class="card h-100" style="width: 100%; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
    <img src="{{ asset($image) }}" class="card-img-top" alt="{{ $title }}" style="height: 200px; object-fit: cover; border-radius: 10px 10px 0 0;">
    <div class="card-body d-flex flex-column">
        <h5 class="card-title text-dark font-semibold mb-2" style="font-size: 1.2rem;">{{ $title }}</h5>
        <p class="card-text text-gray-600 mb-4">{{ Str::limit($description, 100) }}</p>
        <p class="card-text font-semibold mt-auto">{{ 'Rp ' . number_format($price, 0, ',', '.') . ' /hari' }}</p>
        {{ $slot }}
    </div>
</div>
