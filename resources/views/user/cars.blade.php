<x-app-layout>
<section class="cars py-5">
    <div class="container">
        <h2 class="text-center mb-4">Our Cars</h2>
        <div class="row justify-content-center g-4">
            @foreach($cars as $car)
            <div class="col-sm-4 col-md-3 mb-4">
                <x-userapp.cars-card :image="$car->gambar" :title="$car->nama_mobil" 
                    :description="$car->deskripsi" 
                    :price="$car->harga_sewa">
                    <div class="d-flex">
                        <x-secondary-button class="btn-secondary mr-2" data-bs-toggle="modal" data-bs-target="#modal-detail-mobil{{ $car->id }}">Detail</x-secondary-button>
                        <x-primary-button class="btn-primary" data-bs-toggle="modal" data-bs-target="#modal-transaksi{{ $car->id }}">Sewa Sekarang</x-primary-button>
                    </div>
                </x-userapp.cars-card>
                <x-userapp.modal-detail-mobil :mobil="$car" />
                <x-userapp.modal-user-transaksi :mobil="$car" :user="$user" />
            </div>
            @endforeach
        </div>
    </div>
</section>
</x-app-layout>
