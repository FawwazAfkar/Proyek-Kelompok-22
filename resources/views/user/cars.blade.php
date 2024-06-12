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
                    <x-primary-button class="btn-primary">Rent Now</x-primary-button>
                </x-userapp.cars-card>
            </div>
            @endforeach
        </div>
    </div>
</section>
</x-app-layout>