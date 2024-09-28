<!DOCTYPE html>
<html>
<head>
    <title>Rental Details</title>
</head>
<body>
    <h1>Rental Details</h1>
    <p>Dear {{ $rental->user->name }},</p>
    <p>Thank you for renting the car "{{ $rental->car->name }}" from our service. Here are your rental details:</p>

    <ul>
        <li>Car Name: {{ $rental->car->name }}</li>
        <li>Rental Start Date: {{ $rental->start_date }}</li>
        <li>Rental End Date: {{ $rental->end_date }}</li>
        <li>Total Cost: ${{ $rental->total_cost }}</li>
    </ul>

    <p>We hope you enjoy your ride!</p>
</body>
</html>
