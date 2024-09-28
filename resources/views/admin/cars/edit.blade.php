<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Car') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('cars.update', $car->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Car Name -->
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Car Name</label>
                            <input type="text" name="name" id="name" value="{{ $car->name }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                        </div>

                        <!-- Brand -->
                        <div class="mb-4">
                            <label for="brand" class="block text-sm font-medium text-gray-700">Brand</label>
                            <input type="text" name="brand" id="brand" value="{{ $car->brand }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                        </div>

                        <!-- Model -->
                        <div class="mb-4">
                            <label for="model" class="block text-sm font-medium text-gray-700">Model</label>
                            <input type="text" name="model" id="model" value="{{ $car->model }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                        </div>

                        <!-- Year of Manufacture -->
                        <div class="mb-4">
                            <label for="year" class="block text-sm font-medium text-gray-700">Year of Manufacture</label>
                            <input type="number" name="year" id="year" value="{{ $car->year }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                        </div>

                        <!-- Car Type -->
                        <div class="mb-4">
                            <label for="car_type" class="block text-sm font-medium text-gray-700">Car Type</label>
                            <input type="text" name="car_type" id="car_type" value="{{ $car->car_type }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                        </div>

                        <!-- Daily Rent Price -->
                        <div class="mb-4">
                            <label for="daily_rent_price" class="block text-sm font-medium text-gray-700">Daily Rent Price ($)</label>
                            <input type="number" name="daily_rent_price" id="daily_rent_price" value="{{ $car->daily_rent_price }}" step="0.01" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                        </div>

                        <!-- Availability -->
                        <div class="mb-4">
                            <label for="availability" class="block text-sm font-medium text-gray-700">Availability</label>
                            <select name="availability" id="availability" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                                <option value="1" {{ $car->availability ? 'selected' : '' }}>Available</option>
                                <option value="0" {{ !$car->availability ? 'selected' : '' }}>Not Available</option>
                            </select>
                        </div>

                        <!-- Car Image -->
                        <div class="mb-4">
                            <label for="image" class="block text-sm font-medium text-gray-700">Car Image</label>
                            <input type="file" name="image" id="image" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" accept="image/*">
                            @if ($car->image)
                                <p class="mt-2 text-sm text-gray-500">Current Image: <img src="{{ asset('storage/'.$car->image) }}" alt="{{ $car->name }}" class="w-20 h-20 object-cover rounded-md"></p>
                            @endif
                        </div>

                        <!-- Description -->
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Description (Optional)</label>
                            <textarea name="description" id="description" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ $car->description }}</textarea>
                        </div>

                        <!-- Number of Seats -->
                        <div class="mb-4">
                            <label for="number_of_seats" class="block text-sm font-medium text-gray-700">Number of Seats (Optional)</label>
                            <input type="number" name="number_of_seats" id="number_of_seats" value="{{ $car->number_of_seats }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>

                        <!-- Submit Button -->
                        <div class="mb-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white uppercase tracking-widest hover:bg-blue-700 focus:outline-none focus:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                Update Car
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
