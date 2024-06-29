<x-app-layout>
    <section class="cars py-5">
        <div class="container">
            <h2 class="text-center mb-12 text-dark font-bold" style="font-size: 2rem">Daftar Mobil Kami</h2>
            <div class="row justify-content-center g-4">
                @foreach($cars as $car)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                    <x-userapp.cars-card :image="$car->gambar" :title="$car->nama_mobil" 
                        :description="$car->deskripsi" 
                        :price="$car->harga_sewa">
                        <div class="d-flex flex-column flex-md-row">
                            <x-secondary-button class="btn-secondary mb-2 mb-md-0 mr-2 mr-md-2" data-bs-toggle="modal" data-bs-target="#modal-detail-mobil{{ $car->id }}">Detail</x-secondary-button>
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
    