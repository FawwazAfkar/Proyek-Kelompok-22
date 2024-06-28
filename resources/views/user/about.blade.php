<x-app-layout>
<section class="about py-5">
    <div class="container">
        <h2 class="text-center mb-4">About Us</h2>
        <p class="text-center">Welcome to our car rental service! We are a team of passionate individuals dedicated to providing you with the best car rental experience. Our mission is to make your journey smoother and more enjoyable.</p>
        <div class="row justify-content-center mt-4">
            <div class="col-sm-4 mb-4">
                <x-userapp.card class="h-100 border-0 shadow-sm" :title="'Our Vision'" :description="'To be the leading car rental service provider in the region.'">
                    <x-userapp.icon :icon="'fa-solid fa-eye'"/>
                </x-userapp.card>
            </div>
            <div class="col-sm-4 mb-4">
                <x-userapp.card class="h-100 border-0 shadow-sm" :title="'Our Mission'" :description="'To provide a wide range of vehicles at competitive prices with exceptional customer service.'">
                    <x-userapp.icon :icon="'fa-solid fa-bullseye'"/>
                </x-userapp.card>
            </div>
            <div class="col-sm-4 mb-4">
                <x-userapp.card class="h-100 border-0 shadow-sm" :title="'Our Values'" :description="'Safety, Reliability, and Customer Satisfaction.'">
                    <x-userapp.icon :icon="'fa-solid fa-heart'"/>
                </x-userapp.card>
            </div>
        </div>
    </div>
</section>
</x-app-layout>