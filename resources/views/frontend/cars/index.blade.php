@extends('admin.layouts.app')

@section('content')
    <h1>Cars Management</h1>

    <a href="{{ route('admin.cars.create') }}">Add New Car</a>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Brand</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cars as $car)
                <tr>
                    <td>{{ $car->name }}</td>
                    <td>{{ $car->car_type }}</td>
                    <td>{{ $car->brand }}</td>
                    <td>${{ $car->daily_rent_price }}</td>
                    <td>
                        <a href="{{ route('admin.cars.edit', $car->id) }}">Edit</a>
                        <form action="{{ route('admin.cars.destroy', $car->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
