<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Car;
use App\Models\User;
use App\Models\Rental;
use Illuminate\Http\Request;
use App\Mail\RentalDetailsMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\RentalAdminNotification;

class RentalController extends Controller
{
    public $cars;
    public $user;
    public $users;
    public $selectedCar;
    public $totalRentals;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all rentals
        $rentals = Rental::with('car', 'user')->get();
        $totalRentals = $rentals->count();

    // Fetch past rentals for the logged-in user

        $this->updateExpiredRentals();
        return view('admin.rentals.index', compact('rentals', 'totalRentals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cars = Car::where('availability', 1)->get(); // Only available cars

    // Fetch the user
    $user = Auth::user();

    $users= User::all();


    return view('admin.rentals.create', compact('cars', 'user','users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the input
        $validated = $request->validate([
            'car_id' => 'required|exists:cars,id',
            'user_id' => 'required|exists:users,id',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
            'total_cost' => 'required|numeric|min:0',
            'status' => 'required|in:ongoing,completed,canceled',
        ]);

        // Create the rental record
        $rental = new Rental();
        $rental->car_id = $validated['car_id'];
        $rental->user_id = $validated['user_id'];
        $rental->start_date = $validated['start_date'];
        $rental->end_date = $validated['end_date'];
        $rental->total_cost = $validated['total_cost'];
        $rental->status = $validated['status'];
        $rental->save();


        $car = Car::find($validated['car_id']);
        $car->availability = ($validated['status'] === 'ongoing') ? 0 : 1; //1=>available, 0=>unavailable
        $car->save();



        flash()->addSuccess('Rental created successfully.');
        return redirect()->route('rentals.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->updateExpiredRentals();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $rental = Rental::findOrFail($id);
        $cars = Car::where('availability', 1)->get();
        $user = auth()->user();

        return view('admin.rentals.edit', compact('rental', 'cars', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $rental = Rental::findOrFail($id);

        $validatedData = $request->validate([
            'car_id' => 'required|exists:cars,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'status' => 'required|string',
        ]);

        $rental->update($validatedData);

        // Update car availability if changed
        $car = Car::find($rental->car_id);
        if ($request->status === 'completed' || $request->status === 'canceled') {
            $car->availability = 1; // Set to available
        } else {
            $car->availability = 0; // Set to not available
        }
        $car->save();

        return redirect()->route('rentals.index')->with('success', 'Rental updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */

     public function cancel($id)
    {
        $rental = Rental::findOrFail($id);
        $currentDate = Carbon::now();

        // Check if the rental can be canceled
        if ($currentDate->lessThan($rental->start_date)) {
            // Set status to canceled
            $rental->update(['status' => 'canceled']);

            // Make car available again
            $rental->car->update(['availability' => true]);

            return redirect()->route('rentals.index')->with('success', 'Rental canceled successfully.');
        }

        return redirect()->route('rentals.index')->with('error', 'You cannot cancel ongoing rentals.');
    }
    public function destroy($id)
    {

        $rental = Rental::findOrFail($id);

        // Check if the rental is ongoing
        if ($rental->status === 'ongoing') {
            return redirect()->route('rentals.index')->with('error', 'You cannot delete ongoing rentals.');
        }

        // Find the associated car
        $car = Car::find($rental->car_id);

        if ($car) {

            $car->availability = true; // true = Available
            $car->save();
        }


        $rental->delete();


        return redirect()->route('rentals.index')->with('success', 'Rental deleted successfully.');
    }

    protected function updateExpiredRentals()
    {
        // Get the current date
        $currentDate = Carbon::now();

        // Find rentals where the end date has passed and the status is not 'completed' or 'canceled'
        $rentals = Rental::where('end_date', '<', $currentDate)
                         ->where('status', '!=', 'completed')
                         ->where('status', '!=', 'canceled')
                         ->get();


        foreach ($rentals as $rental) {
            $rental->update(['status' => 'completed']);
           
            $rental->car->update(['availability' => true]);
        }
    }

}
