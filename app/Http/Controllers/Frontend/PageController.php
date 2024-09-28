<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;


class PageController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public $cars;
    public $car;
    public $carTypes;
    public $types;
    public $brands;
    public $brand;
    public $availableCars;
    public $availableCar;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    // Fetch distinct car types and brands
    $carTypes = Car::select('car_type')->distinct()->get();
    $brands = Car::select('brand')->distinct()->get();
    $query = Car::where('availability', 1);

    // Initialize the query builder
    // $query = Car::query();

  //filters

    if ($request->car_type) {
        $query->where('car_type', $request->car_type);
    }

    if ($request->filled('brand')) {
        $query->where('brand', $request->brand);
    }

    if ($request->filled('min_price') && $request->filled('max_price')) {
        $query->whereBetween('daily_rent_price', [$request->min_price, $request->max_price]);
    }


    $availableCars = $query->get();



    return view('frontend.customer_dashboard', compact( 'carTypes', 'brands', 'availableCars'));


}



    public function home()
    {
        $cars = Car::all();
        return view('frontend.pages.home', compact('cars'));
    }

    public function about()
    {
        return view('frontend.pages.about');
    }

    public function contact()
    {
        return view('frontend.pages.contact'); 
    }
}
