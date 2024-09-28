<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\Car;
use App\Models\Rental;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Mail\RentalDetailsMail;
use App\Mail\RentalMail;
use Illuminate\Support\Facades\Mail;
class RentalController extends Controller
{
    public $selectedCar;
    public $currentRentals;
    public $pastRentals;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch rentals for the logged-in user
        $rentals = Rental::where('user_id', auth()->id())->get();
        $currentRentals = Rental::where('user_id', auth()->id())
        ->where('status', 'ongoing')
        ->get();

    // Fetch past rentals for the logged-in user (completed or canceled)
    $pastRentals = Rental::where('user_id', auth()->id())
        ->whereIn('status', ['completed', 'canceled'])
        ->get();

        // Update rental statuses for expired rentals
        $this->updateExpiredRentals();

        return view('frontend.rentals.index', compact('rentals', 'currentRentals', 'pastRentals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // Show rental creation form
        $user = Auth::user();
        $cars = Car::all(); // Fetch all cars
    $selectedCarId = $request->query('car_id');
        return view('frontend.rentals.create', compact('user', 'cars', 'selectedCarId'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $validated = $request->validate([
            'car_id' => 'required|exists:cars,id',
            'user_id' => 'required|exists:users,id',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after_or_equal:start_date',
            'total_cost' => 'required|numeric|min:0',
            'status' => 'required|string|in:ongoing,completed,canceled',
        ]);

        $rental = new Rental($validated);
        $rental->user_id = Auth::id();
        $rental->save();

        // Update car availability  (unavailable)
        $car = Car::find($request->car_id);
        $car->availability = false;
        $car->save();
        Mail::to($rental->user->email)->send(new RentalMail($rental));

    // Optionally, send email to the admin
        Mail::to('admin@example.com')->send(new RentalMail($rental));

    return redirect()->route('rental.index')->with('success', 'Rental created successfully.');





    }

    /**
     * Display the specified resource.
     */
    public function show(Rental $rental)
    {


        if ($rental->user_id !== Auth::id()) {
            abort(403);
        }
        $this->updateExpiredRentals();

        return view('frontend.rentals.my_bookings', compact('rental'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // only the owner or an admin can edit the rental


        $rental = Rental::findOrFail($id);
        $cars = Car::all(); // Only available cars
        $user = auth()->user();
        $selectedCar = Car::findOrFail($rental->car_id);

        if ($rental->user_id !== Auth::id()) {
            abort(403);
        }
        return view('frontend.rentals.edit', compact('rental', 'cars', 'user', 'selectedCar'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rental $rental)
    {
        $validated = $request->validate([
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after_or_equal:start_date',
            'status' => 'required|string|in:ongoing,completed,canceled',
        ]);

        $rental->update($validated);
        if (in_array($request->status, ['canceled', 'completed'])) {

            $rental->car->update(['availability' => true]);
        }

        return redirect()->route('rental.index')->with('success', 'Rental updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */


     public function cancel($id)
    {
        $rental = Rental::findOrFail($id);
        $currentDate = Carbon::now();


        if ($currentDate->lessThan($rental->start_date)) {

            $rental->update(['status' => 'canceled']);


            $rental->car->update(['availability' => true]);

            return redirect()->route('rental.index')->with('success', 'Rental canceled successfully.');
        }

        return redirect()->route('rental.index')->with('error', 'You cannot cancel ongoing rentals.');
    }
    public function destroy(Rental $rental)
{

    if ($rental->user_id !== Auth::id()) {
        abort(403);
    }


    if ($rental->status === 'ongoing') {
        return redirect()->route('rental.index')->with('error', 'You cannot delete ongoing rentals.');
    }

    // Delete  rental and make  car available
    $car = Car::find($rental->car_id);
    $car->availability = true;
    $car->save();

    $rental->delete();

    return redirect()->route('rental.index')->with('success', 'Rental deleted successfully.');
}

    protected function updateExpiredRentals()
    {
        // Get the current date
        $currentDate = Carbon::now();

        // Find rentals where the end date has passed and the status is not changed
        $rentals = Rental::where('end_date', '<', $currentDate)
                         ->where('status', '!=', 'completed')
                         ->where('status', '!=', 'canceled')
                         ->get();

        // Update the status of each rental to complete
        foreach ($rentals as $rental) {
            $rental->update(['status' => 'completed']);

            $rental->car->update(['availability' => true]);
        }
    }
}
