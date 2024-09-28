<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Rental History for ' . $customer->name) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if($rentals->isNotEmpty())
                        <table class="w-full table-auto">
                            <thead>
                                <tr class="bg-gray-200">
                                    <th class="px-4 py-2">Serial</th>
                                    <th class="px-4 py-2">Car</th>
                                    <th class="px-4 py-2">Rental Date</th>
                                    <th class="px-4 py-2">Return Date</th>
                                    <th class="px-4 py-2">Total Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rentals as $rental)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                                        <td class="border px-4 py-2">{{ $rental->car->name }}</td>
                                        <td class="border px-4 py-2">{{ $rental->start_date }}</td>
                                        <td class="border px-4 py-2">{{ $rental->end_date }}</td>
                                        <td class="border px-4 py-2">${{ $rental->total_cost }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No rental history for this customer.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
