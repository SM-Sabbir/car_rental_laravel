<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Customers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('customers.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block hover:bg-blue-600">
                        Add New Customer
                    </a>
                    <table class="w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="px-4 py-2">Name</th>
                                <th class="px-4 py-2">Email</th>
                                <th class="px-4 py-2">Phone</th>
                                <th class="px-4 py-2">Address</th>
                                <th class="px-4 py-2">User role</th>
                                <th class="px-4 py-2">Actions</th>
                                <th class="px-4 py-2">View rentals history</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if(isset($customers) && $customers->isNotEmpty())
                                @foreach ($customers as $customer)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $customer->name }}</td>
                                        <td class="border px-4 py-2">{{ $customer->email }}</td>
                                        <td class="border px-4 py-2">{{ $customer->phone_number }}</td>
                                        <td class="border px-4 py-2">{{ $customer->address }}</td>
                                        <td class="border px-4 py-2">{{ $customer->role }}</td>
                                        <td class="border px-4 py-2">
                                            <a href="{{ route('customers.edit', $customer->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Edit</a>
                                            <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Delete</button>
                                            </form>

                                            <td class="border px-4 py-2">
                                                <a href="{{ route('customers.rentals', $customer->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Rental History</a>
                                            </td>

                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4" class="text-center text-gray-500 py-4">
                                        No customers available.
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
