@extends('layouts.app')

@section('content')
    <h1>{{ $car->name }}</h1>

    <div class="card">
        <img src="{{ asset('storage/' . $car->image) }}" class="card-img-top" alt="{{ $car->name }}">
        <div class="card-body">
            <h5 class="card-title">{{ $car->brand }} - {{ $car->model }} ({{ $car->year }})</h5>
            <p>Daily Rent: ${{ $car->daily_rent_price }}</p>

            <form action="{{ route('frontend.rentals.store', $car->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="start_date">Start Date:</label>
                    <input type="date" name="start_date" class="form-control">
                </div>
                <div class="form-group">
                    <label for="end_date">End Date:</label>
                    <input type="date" name="end_date" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Book Now</button>
            </form>
        </div>
    </div>
@endsection

