@extends('frontend.layouts.app')

@section('content')
    <h1>My Bookings</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($bookings->isEmpty())
        <p>You have no bookings at the moment.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Car</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Total Cost</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                    <tr>
                        <td>{{ $booking->car->name }}</td>
                        <td>{{ $booking->start_date }}</td>
                        <td>{{ $booking->end_date }}</td>
                        <td>${{ $booking->total_cost }}</td>
                        <td>
                            @if($booking->start_date > now())
                                Upcoming
                            @elseif($booking->end_date < now())
                                Completed
                            @else
                                Ongoing
                            @endif
                        </td>
                        <td>
                            @if($booking->start_date > now())
                                <form action="{{ route('frontend.rentals.cancel', $booking->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Cancel</button>
                                </form>
                            @else
                                N/A
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
