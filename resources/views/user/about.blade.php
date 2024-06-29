<x-app-layout>
    <section class="about py-5">
        <div class="container">
            <h2 class="text-center mb-4">Tentang Kami</h2>
            <p class="text-center">Selamat datang di layanan sewa mobil kami! Kami adalah tim yang berdedikasi untuk memberikan Anda pengalaman penyewaan mobil terbaik. Misi kami adalah membuat perjalanan Anda lebih lancar dan menyenangkan.</p>
            <div class="row justify-content-center mt-4">
                <div class="col-lg-4 col-md-6 mb-4">
                    <x-userapp.card class="h-100 border-0 shadow-sm" :title="'Visi Kami'" :description="'Menjadi penyedia layanan sewa mobil terdepan di wilayah ini.'">
                        <x-userapp.icon :icon="'fa-solid fa-eye'"/>
                    </x-userapp.card>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <x-userapp.card class="h-100 border-0 shadow-sm" :title="'Misi Kami'" :description="'Menyediakan berbagai jenis kendaraan dengan harga kompetitif dan layanan pelanggan yang luar biasa.'">
                        <x-userapp.icon :icon="'fa-solid fa-bullseye'"/>
                    </x-userapp.card>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <x-userapp.card class="h-100 border-0 shadow-sm" :title="'Nilai-Nilai Kami'" :description="'Keamanan, Keandalan, dan Kepuasan Pelanggan.'">
                        <x-userapp.icon :icon="'fa-solid fa-heart'"/>
                    </x-userapp.card>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <x-userapp.card class="h-100 border-0 shadow-sm" :title="'Komitmen Kami'" :description="'Memberikan pelayanan terbaik bagi pelanggan dengan penuh tanggung jawab.'">
                        <x-userapp.icon :icon="'fa-solid fa-handshake'"/>
                    </x-userapp.card>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <x-userapp.card class="h-100 border-0 shadow-sm" :title="'Kualitas Kami'" :description="'Mengutamakan kualitas kendaraan dan layanan untuk kenyamanan Anda.'">
                        <x-userapp.icon :icon="'fa-solid fa-star'"/>
                    </x-userapp.card>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <x-userapp.card class="h-100 border-0 shadow-sm" :title="'Inovasi Kami'" :description="'Selalu berinovasi untuk memberikan solusi terbaik dalam penyewaan mobil.'">
                        <x-userapp.icon :icon="'fa-solid fa-lightbulb'"/>
                    </x-userapp.card>
                </div>
            </div>
        </div>
    </section>
    </x-app-layout>
    