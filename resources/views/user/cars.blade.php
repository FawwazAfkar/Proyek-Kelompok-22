<x-app-layout>
    <section class="cars py-5 flex-grow-1">
        <div class="container h-auto" style="margin-top: 2.5rem">
            <h2 class="text-center mb-12 text-dark font-bold" style="font-size: 2rem">Daftar Mobil Kami</h2>
            <div class="row justify-content-center g-4">
                @foreach($cars as $car)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                    <x-userapp.cars-card :image="$car->gambar" :title="$car->nama_mobil" 
                        :description="$car->deskripsi" 
                        :price="$car->harga_sewa"
                        :carid="$car->id"
                        :ketersediaan="$car->ketersediaan">                  
                    </x-userapp.cars-card>
                    <x-userapp.modal-detail-mobil :mobil="$car" />
                    <x-userapp.modal-user-transaksi :mobil="$car" :user="$user" />
                </div>
                @endforeach
            </div>
        </div>
    </section>
    </x-app-layout>
    