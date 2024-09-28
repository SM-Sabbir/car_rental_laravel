<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Rentals List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('rentals.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block hover:bg-blue-600">
                        Add New Rental
                    </a>

                    <p class="text-black-600 mb-4 font-bold text-xl">Total Rentals: {{ $totalRentals }}</p>
                    <table class="w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="px-4 py-2"> Rental ID</th>
                                <th class="px-4 py-2">Car</th>
                                <th class="px-4 py-2">User</th>
                                <th class="px-4 py-2">Start Date</th>
                                <th class="px-4 py-2">End Date</th>
                                <th class="px-4 py-2">Total Cost</th>
                                <th class="px-4 py-2">Status</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if(isset($rentals) && $rentals->isNotEmpty())
                                @foreach ($rentals as $rental)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $rental->id }}</td>
                                        <td class="border px-4 py-2">{{ $rental->car->name }}</td>
                                        <td class="border px-4 py-2">{{ $rental->user->name }}</td>
                                        <td class="border px-4 py-2">{{ $rental->start_date }}</td>
                                        <td class="border px-4 py-2">{{ $rental->end_date }}</td>
                                        <td class="border px-4 py-2">${{ $rental->total_cost }}</td>
                                        <td class="border px-4 py-2">{{ ucfirst($rental->status) }}</td>
                                        <td class="border px-4 py-2">
                                            <a href="{{ route('rentals.edit', $rental->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Edit</a>
                                            <form action="{{ route('rentals.cancel', $rental->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Cancel</button>
                                            </form>
                                            <form action="{{ route('rentals.destroy', $rental->id) }}" method="POST" style="display:inline;">
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
                                        No rentals available.
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
