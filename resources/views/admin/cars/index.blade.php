<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cars List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('cars.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block hover:bg-blue-600">
                        Add New Car
                    </a>
                    <table class="w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="px-4 py-2">Name</th>
                                <th class="px-4 py-2">Brand</th>
                                <th class="px-4 py-2">Model</th>
                                <th class="px-4 py-2">Year</th>
                                <th class="px-4 py-2">Daily Rent Price</th>
                                <th class="px-4 py-2">Availability</th>
                                <th class="px-4 py-2">Picture</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if(isset($cars) && $cars->isNotEmpty())

                                @foreach ($cars as $car)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $car->name }}</td>
                                        <td class="border px-4 py-2">{{ $car->brand }}</td>
                                        <td class="border px-4 py-2">{{ $car->model }}</td>
                                        <td class="border px-4 py-2">{{ $car->year }}</td>
                                        <td class="border px-4 py-2">{{ $car->daily_rent_price }}</td>
                                        <td class="border px-4 py-2">{{ $car->availability ? 'Available' : 'Not Available' }}</td>
                                        <td class="border px-4 py-2">{{ $car->image}}</td>
                                        <td class="border px-4 py-2">
                                            <a href="{{ route('cars.edit', $car->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Edit</a>
                                            <form action="{{ route('cars.destroy', $car->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7" class="text-center text-gray-500 py-4">
                                        No cars available.
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

