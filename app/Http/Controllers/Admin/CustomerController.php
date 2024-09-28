<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Rental;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    // Display a listing of customers
    public function index()
    {
        // Retrieve all  role customer
        $customers = User::where('role', 'customer')->get();
        return view('admin.customers.index', compact('customers'));
    }

    //  form for creating a new customer
    public function create()
    {
        return view('admin.customers.create');
    }

    // Store a new customer
    public function store(Request $request)
    {
        // Validate the input data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'role' => 'required|in:admin,customer',
            'password' => 'required|string|min:8',
            'phone_number' => 'nullable|string',
            'address' => 'nullable|string',
        ]);

        // Create a new user with the given role
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone_number,
            'address' => $request->address,
        ]);

        return redirect()->route('customers.index')->with('success', 'Customer created successfully.');
    }


    // Show the form for editing the specified customer
    public function edit($id)
    {
        $customer = User::findOrFail($id);
        return view('admin.customers.edit', compact('customer'));
    }

    // Update the specified customer in storage
    public function update(Request $request, $id)
        {
            // Validate the input data
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $id,
                'role' => 'required|in:admin,customer',
                'phone_number' => 'nullable|string|max:15',
                'address' => 'nullable|string|max:255',
            ]);

            // Find  customer by ID
            $customer = User::findOrFail($id);

            // Update customer details
            $customer->update([
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
                'phone_number' => $request->phone_number, // nullable
                'address' => $request->address, // nullable
            ]);


            return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
        }

    
    public function destroy($id)
    {
        $customer = User::findOrFail($id);
        $customer->delete();

        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
    }

    public function rentalHistory($id)
    {
        $customer = User::findOrFail($id);
        $rentals = Rental::where('user_id', $customer->id)->get();

        return view('admin.customers.rental', compact('customer', 'rentals'));
    }

}
