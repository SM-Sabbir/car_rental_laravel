<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental - Home</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>
    <header class="home-header">
        <nav class="home-nav">

            <ul class="nav-links">
                <li><a href="{{ route('about') }}">About</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
                <li><a href="{{ route('car.index') }}">Browse Cars</a></li>
                @auth
                    <li><a href="{{ route('customer_dashboard') }}">Dashboard</a></li>
                    <li>
                        <a href="#" class="text-blue-600 hover:text-blue-900" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                            @csrf
                        </form>
                    </li>


                @else
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Sign Up</a></li>
                @endauth
            </ul>
        </nav>
    </header>

    <section class="home-banner">
        <div class="banner-content">
            <h1>Welcome to Car Rental Services</h1>
            <p>Browse our collection of cars and find the perfect one for your needs!</p>
            <a href="{{ route('car.index') }}" class="btn browse-btn">Browse Cars</a>
        </div>
    </section>

    <section class="car-cards">
        <h2>Our Cars</h2>
        <div class="card-container">
            @foreach($cars as $car)
                <div class="card">
                    <img src="{{ asset('storage/' . $car->image) }}" alt="{{ $car->name }}">
                    <h3>{{ $car->name }}</h3>
                    <p><strong>Brand:</strong> {{ $car->brand }}</p>
                    <p><strong>Daily Rent Price:</strong> ${{ $car->daily_rent_price }}</p>
                    <a href="{{ route('rental.create', ['car' => $car->id]) }}" class="btn book-btn">Book Now</a>
                </div>
            @endforeach
        </div>

        <style>
            .card p {
                margin-bottom: 10px; /* Adjust this value as needed */
            }
        </style>


        </div>
    </section>

    <footer class="home-footer">
        <p>&copy; 2024 Car Rental. All rights reserved.</p>
    </footer>
</body>
</html>
