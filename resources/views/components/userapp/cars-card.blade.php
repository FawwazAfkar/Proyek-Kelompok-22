@props(['image', 'title', 'description', 'price', 'carid', 'ketersediaan'])

<div class="card h-100 shadow-sm rounded" style="width: 100%;">
    <img src="{{ asset($image) }}" class="card-img-top rounded-top" alt="{{ $title }}" style="height: 200px; object-fit: cover;">
    <div class="card-body d-flex flex-column">
        <h5 class="card-title text-dark fw-bold mb-2">{{ $title }}</h5>
        <p class="card-text text-muted mb-4">{{ Str::limit($description, 80) }}</p>
        <p class="card-text fw-bold mt-auto">{{ 'Rp ' . number_format($price, 0, ',', '.') . ' /hari' }}</p>
        @if ($ketersediaan)
            <p class="card-text text-success fw-bold mb-4">Tersedia</p>
        @else
            <p class="card-text text-danger fw-bold mb-4">Tidak Tersedia</p>
        @endif
        <div class="d-flex flex-column flex-md-row justify-between">
            <x-secondary-button class="btn btn-secondary mb-2 mb-md-0 me-md-2" data-bs-toggle="modal" data-bs-target="#modal-detail-mobil{{ $carid }}">Detail</x-secondary-button>
            @if ($ketersediaan)
                <x-primary-button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-transaksi{{ $carid }}">Sewa Sekarang</x-primary-button>
            @else
                <x-danger-button class="btn btn-danger" disabled>Sewa Sekarang</x-danger-button>
            @endif
        </div>
        {{ $slot }}
    </div>
</div>