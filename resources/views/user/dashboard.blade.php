<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Car Rent Website') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <section class="hero flex items-center justify-center text-center py-12 bg-cover" style="background-image: url('your-image-url-here');">
                        <div class="container">
                            <h1 class="text-4xl font-bold text-white">Car Rent Website</h1>
                            <p class="mb-4 text-white">Explore our fleet of cars and book your ride today!</p>
                            <a class="btn btn-primary btn-lg" href="#">Get Started</a>
                        </div>
                    </section>

                    <section class="features py-5 bg-gray-100">
                        <div class="container">
                            <h2 class="text-center text-2xl font-bold mb-4">Why Choose Us?</h2>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div class="card bg-white p-6 shadow-sm rounded-lg text-center">
                                    <i class="fas fa-car fa-3x mb-3 text-primary"></i>
                                    <h5 class="card-title font-bold">Wide Range of Cars</h5>
                                    <p class="card-text">Choose from our extensive collection of high-quality cars to suit your needs.</p>
                                </div>
                                <div class="card bg-white p-6 shadow-sm rounded-lg text-center">
                                    <i class="fas fa-clock fa-3x mb-3 text-primary"></i>
                                    <h5 class="card-title font-bold">24/7 Customer Support</h5>
                                    <p class="card-text">Our dedicated customer support team is available round the clock to assist you.</p>
                                </div>
                                <div class="card bg-white p-6 shadow-sm rounded-lg text-center">
                                    <i class="fas fa-map-marker-alt fa-3x mb-3 text-primary"></i>
                                    <h5 class="card-title font-bold">Convenient Locations</h5>
                                    <p class="card-text">With locations across the city, you can easily pick up and drop off your car.</p>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="cta py-5 bg-gray-800 text-white">
                        <div class="container text-center">
                            <h2 class="text-3xl font-bold">Ready to Rent?</h2>
                            <p class="mb-4">Search for your perfect ride and book now!</p>
                            <a href="#" class="btn btn-primary">Search Cars</a>
                        </div>
                    </section>

                    <section class="cars py-12">
                        <div class="container">
                            <h2 class="text-center text-2xl font-bold mb-4">Our Fleet</h2>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                @foreach ($cars as $car)
                                    <div class="card bg-white p-6 shadow-sm rounded-lg">
                                        <img src="{{ $car->image_url }}" class="card-img-top w-full h-64 object-cover mb-4" alt="{{ $car->model }}">
                                        <div class="card-body">
                                            <h3 class="card-title text-xl font-bold">{{ $car->model }}</h3>
                                            <p class="card-text mb-4">{{ $car->description }}</p>
                                            <p class="card-text font-bold">Price: ${{ $car->price }} / day</p>
                                            <a href="#" class="btn btn-primary mt-4">Rent Now</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
