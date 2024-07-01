@props(['nama', 'deskripsi', 'harga'])

<div class="car-details">
    <h5 class="font-semibold text-lg mb-3">{{ $nama }}</h5>
    <div class="mb-3">
        <strong>Harga Sewa:</strong> Rp <span id="formattedHarga">{{ number_format($harga, 0, ',', '.') }},00</span>
        /hari
    </div>

    <p id="deskripsiText">{{ $deskripsi }}</p>
</div>
