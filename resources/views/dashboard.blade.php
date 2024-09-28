<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Total Cars -->
                <div class="bg-white shadow-sm sm:rounded-lg p-6 text-gray-900">


                    <div class="bg-white shadow-sm sm:rounded-lg p-6 text-gray-900">
                        <h3 class="text-lg font-bold">Total Cars:</h3>
                        <p class="mt-2 text-3xl">{{ $totalCars }}</p>
                    </div>
                </div>
                 <!-- Available Cars -->
                 <div class="bg-white shadow-sm sm:rounded-lg p-6 text-gray-900">
                    <div class="bg-white shadow-sm sm:rounded-lg p-6 text-gray-900">
                        <h3 class="text-lg font-bold">Available Cars</h3>
                        <p class="mt-2 text-3xl">{{ $availableCars }}</p>
                    </div>
                 </div>

                <!-- Total Rentals -->
                <div class="bg-white shadow-sm sm:rounded-lg p-6 text-gray-900">
                    <div class="bg-white shadow-sm sm:rounded-lg p-6 text-gray-900">
                        <h3 class="text-lg font-bold">Total Rentals</h3>
                        <p class="mt-2 text-3xl">{{ $totalRentals }}</p>
                    </div>
                </div>

                <!-- Total Earnings -->
                <div class="bg-white shadow-sm sm:rounded-lg p-6 text-gray-900">
                    <div class="bg-white shadow-sm sm:rounded-lg p-6 text-gray-900">
                        <h3 class="text-lg font-bold">Total Earnings</h3>
                        <p class="mt-2 text-3xl">${{ number_format($totalEarnings, 2) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
