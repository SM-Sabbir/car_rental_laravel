<?php
namespace App\Http\Controllers\Admin;

use App\Models\Car;
use App\Models\Rental;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public $cars;
    public $totalCars;
    public $availableCars;
    public $totalRentals;
    public $totalEarnings;
    public function index()
    {
        $cars = Car::all();
        $totalCars = $cars->count();
        $availableCars = $cars->where('availability', 1)->count();
        $totalRentals = Rental::all()->count();
        $totalEarnings = Rental::sum('total_cost');



        return view('dashboard', compact('cars', 'totalCars', 'availableCars', 'totalRentals', 'totalEarnings'));
    }


}
