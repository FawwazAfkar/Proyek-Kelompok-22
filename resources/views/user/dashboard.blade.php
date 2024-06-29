<x-app-layout>
    <section class="hero d-flex align-items-center justify-content-center text-center" style="background-image: url('{{ asset('storage/images/hero.jpg') }}'); background-size: cover; background-position: center; background-color: rgba(0,0,0,0.5); background-blend-mode: darken;">
        <div class="container" style="color: white">
            <h1>Car Rent Website</h1>
            <p class="mb-4">Explore our fleet of cars and book your ride today!</p>
            <x-primary-button class="btn-primary" onclick="location.href='{{ route('user.cars') }}'">Get Started</x-primary-button>
        </div>
    </section>      
    <section class="features py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">Why Choose Us?</h2>
            <div class="row">
                <div class="col-sm-4 mb-4">
                    <x-userapp.card class="h-100 border-0 shadow-sm" :title="'User'" :description="'haloooo'">
                            <x-userapp.icon :icon="'fa-solid fa-user'"/>
                    </x-userapp.card>
                </div>
                <div class="col-sm-4 mb-4">
                    <x-userapp.card class="h-100 border-0 shadow-sm" :title="'User'" :description="'haloooo'">
                            <x-userapp.icon :icon="'fa-solid fa-user'"/>
                    </x-userapp.card>
                </div>
                <div class="col-sm-4 mb-4">
                    <x-userapp.card class="h-100 border-0 shadow-sm" :title="'User'" :description="'haloooo'">
                            <x-userapp.icon :icon="'fa-solid fa-user'"/>
                    </x-userapp.card>
                </div>
            </div>
        </div>
    </section>        
    <section class="cta py-5 bg-dark text-light">
        <div class="container text-center">
            <h2>Ready to Rent?</h2>
            <p>Search for your perfect ride and book now!</p>
            <x-primary-button class="btn-primary" onclick="location.href='{{ route('user.cars') }}'">Search Cars</x-primary-button>
        </div>
    </section>        
    <section class="cars">
        <div class="container mt-6">
            <h2 class="text-center mb-4">Our Fleet</h2>
            <div class="row justify-content-center g-4">
                @foreach($recentCars as $car)
                <div class="col-sm-4 col-md-3 mb-4">
                    <x-userapp.cars-card :image="$car->gambar" :title="$car->nama_mobil" 
                        :description="$car->deskripsi" 
                        :price="$car->harga_sewa">
                        <div class="d-flex">
                            <x-secondary-button class="btn-secondary mr-2" data-bs-toggle="modal" data-bs-target="#modal-detail-mobil{{ $car->id}}">Detail</x-secondary-button>
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
