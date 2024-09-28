<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Book a Car') }}
        </h2>
    </x-slot>
    <div class="container mx-auto p-4">
        <!-- Filter Form -->
        <form action="{{ route('customer_dashboard') }}" method="GET" class="mb-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
                <!-- Car Type Filter -->
                <div>
                    <label for="car_type" class="block text-gray-700">Car Type</label>
                    <select name="car_type" id="car_type" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="">All Types</option>
                        @foreach($carTypes as $type)
                            <option {{ request('car_type') == $type->car_type ? 'selected' : '' }} value="{{ $type->car_type }}" {{ request('car_type') == $type ? 'selected' : '' }}>{{ $type->car_type }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Brand Filter -->
                <div>
                    <label for="brand" class="block text-gray-700">Brand</label>
                    <select name="brand" id="brand" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="">All Brands</option>
                        @foreach($brands as $brand)
                            <option {{ request('brand') == $brand->brand ? 'selected' : '' }} value="{{ $brand->brand }}">{{ $brand->brand }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Price Filters -->
                <div>
                    <label for="min_price" class="block text-gray-700">Min Price</label>
                    <input type="number" name="min_price" id="min_price" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="Min Price" value="{{ request('min_price') }}">
                </div>
                <div>
                    <label for="max_price" class="block text-gray-700">Max Price</label>
                    <input type="number" name="max_price" id="max_price" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="Max Price" value="{{ request('max_price') }}">
                </div>

                <!-- Filter Button -->
                <div class="flex items-end">
                    <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700">Filter</button>
                </div>
            </div>
        </form>

        <!-- Display Cars -->
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
            @foreach($availableCars as $availableCar)
                <div class="bg-white shadow-lg rounded-lg p-3 transition hover:shadow-xl max-w-xs mx-auto">
                    <img src="{{ asset('storage/' . $availableCar->image) }}" alt="{{ $availableCar->name }}" class="w-full h-32 object-cover rounded-lg mb-4">
                    <h2 class="text-lg font-bold text-gray-900 mb-2">{{ $availableCar->name }}</h2>
                    <p class="text-gray-700 mb-1"><strong>Brand:</strong> {{ $availableCar->brand }}</p>
                    <p class="text-gray-700 mb-1"><strong>Model:</strong> {{ $availableCar->model }}</p>
                    <p class="text-gray-700 mb-1"><strong>Price per day:</strong> ${{ $availableCar->daily_rent_price }}</p>
                    <p class="text-gray-700 mb-1"><strong>Seats:</strong> {{ $availableCar->number_of_seats ?? 'N/A' }}</p>
                    <p class="text-gray-700 mb-4"><strong>Description:</strong> {{ $availableCar->description ?? 'No description available' }}</p>
                    <p class="text-gray-700 mb-4"><strong>Car Type:</strong> {{ $availableCar->car_type ?? 'No description available' }}</p>
                    <a href="{{ route('rental.create', ['car_id' => $availableCar->id]) }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white py-2 px-3 rounded-lg transition-all">
                        Book Now
                    </a>

                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
