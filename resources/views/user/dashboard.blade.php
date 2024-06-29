<x-app-layout>
    <section class="hero d-flex align-items-center justify-content-center text-center" style="background-image: url('{{ asset('storage/images/hero.jpg') }}'); background-size: cover; background-position: center; background-color: rgba(0,0,0,0.5); background-blend-mode: darken;">
        <div class="container" style="color: white">
            <h1>Website Sewa Mobil</h1>
            <p class="mb-4">Jelajahi armada mobil kami dan pesan perjalanan Anda hari ini!</p>
            <x-primary-button class="btn-primary py-3 px-6 rounded-md" onclick="location.href='{{ route('user.cars') }}'">Mulai Sewa</x-primary-button>
        </div>
    </section>      
    <section class="features py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4 text-dark font-bold" style="font-size: 1.5rem">Mengapa memilih kami?</h2>
            <div class="row">
                <div class="col-sm-4 mb-4">
                    <x-userapp.card class="h-100 border-0 shadow-sm" :title="'Beragam Pilihan Mobil'" 
                        :description="'Kami menawarkan berbagai jenis mobil yang dapat dipilih sesuai kebutuhan Anda.'">
                        <x-userapp.icon :icon="'fa-solid fa-car'"/>
                    </x-userapp.card>
                </div>
                <div class="col-sm-4 mb-4">
                    <x-userapp.card class="h-100 border-0 shadow-sm" :title="'Layanan Pelanggan Terbaik'" 
                        :description="'Tim kami siap membantu Anda 24/7 dengan layanan yang ramah dan profesional.'">
                        <x-userapp.icon :icon="'fa-solid fa-headset'"/>
                    </x-userapp.card>
                </div>
                <div class="col-sm-4 mb-4">
                    <x-userapp.card class="h-100 border-0 shadow-sm" :title="'Harga Kompetitif'" 
                    :description="'Kami menawarkan harga sewa mobil yang kompetitif tanpa mengurangi kualitas layanan.'">
                        <x-userapp.icon :icon="'fa-solid fa-tags'"/>
                    </x-userapp.card>
                </div>
            </div>
        </div>
    </section>        
    <section class="cta py-5 bg-dark text-light">
        <div class="container text-center">
            <h2 style="font-size: 2rem; font-weight: bold; margin-bottom: 1rem;">Bersedia untuk menyewa?</h2>
            <p style="font-size: 1.25rem; margin-bottom: 2rem;">Cari mobil yang sempurna dan pesan sekarang!</p>
            <x-primary-button class="btn-primary py-3 px-6 rounded-md" onclick="location.href='{{ route('user.cars') }}'">Jelajahi Mobil</x-primary-button>
        </div>
    </section>        
    <section class="cars">
        <div class="container mt-6">
            <h2 class="text-center mb-4 text-dark font-bold" style="font-size: 1.5rem">Armada Terbaru Kami</h2>
            <div class="row justify-content-center g-4">
                @foreach($recentCars as $car)
                <div class="col-sm-4 col-md-3 mb-4">
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
