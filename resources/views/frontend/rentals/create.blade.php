<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Rental') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('rental.store') }}" method="POST">
                        @csrf

                        <!-- Select Car -->
                        <div class="mb-4">
                            <label for="car_id" class="block text-sm font-medium text-gray-700">Select Car</label>
                            <select name="car_id" id="car_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required onchange="updateDailyRentPrice()">
                                <option value="">Select a car</option>
                                @foreach ($cars as $car)
                                    <option value="{{ $car->id }}" data-daily-price="{{ $car->daily_rent_price }}"
                                        {{ $car->id == $selectedCarId ? 'selected' : '' }}>
                                        {{ $car->name }} ({{ $car->brand }} {{ $car->model }} - ${{ $car->daily_rent_price }} / day)
                                    </option>
                                @endforeach
                            </select>
                        </div>


                        <!-- Select User -->
                        <div class="mb-4">
                            <label for="user_id" class="block text-sm font-medium text-gray-700">User</label>
                            <select name="user_id" id="user_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            </select>
                        </div>

                        <!-- Rental Start Date -->
                        <div class="mb-4">
                            <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
                            <input type="date" name="start_date" id="start_date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required onchange="calculateTotalCost()">
                        </div>

                        <!-- Rental End Date -->
                        <div class="mb-4">
                            <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>
                            <input type="date" name="end_date" id="end_date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required onchange="calculateTotalCost()">
                        </div>

                        <!-- Total Cost -->
                        <div class="mb-4">
                            <label for="total_cost" class="block text-sm font-medium text-gray-700">Total Cost ($)</label>
                            <input type="number" name="total_cost" id="total_cost" step="0.01" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" readonly>
                        </div>

                        <!-- Status -->
                        <div class="mb-4">
                            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                            <select name="status" id="status" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                                <option value="ongoing">Ongoing</option>
                                <option value="completed">Completed</option>
                                <option value="canceled">Canceled</option>
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <div class="mb-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white uppercase tracking-widest hover:bg-blue-700 focus:outline-none focus:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                Add Rental
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function calculateTotalCost() {
    const carSelect = document.getElementById('car_id');
    const selectedOption = carSelect.options[carSelect.selectedIndex];
    const dailyRentPrice = selectedOption ? parseFloat(selectedOption.getAttribute('data-daily-price')) : 0;

    const startDateInput = document.getElementById('start_date').value;
    const endDateInput = document.getElementById('end_date').value;

    // Only proceed if both dates are provided
    if (startDateInput && endDateInput) {
        const startDate = new Date(startDateInput);
        const endDate = new Date(endDateInput);

        // Check if startDate is before endDate
        if (startDate <= endDate) {
            // Calculate the number of days between start and end dates (inclusive)
            const numberOfDays = (endDate - startDate) / (1000 * 3600 * 24) + 1; // Adding 1 to include both start and end dates

            const totalCost = dailyRentPrice * numberOfDays;
            document.getElementById('total_cost').value = totalCost.toFixed(2); // Format to 2 decimal places
        } else {
            document.getElementById('total_cost').value = ''; // Reset if invalid
        }
    } else {
        document.getElementById('total_cost').value = ''; // Reset if either date is missing
    }
}

    </script>
</x-app-layout>
