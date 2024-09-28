<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->bigIncrements('id'); // BIGINT primary key
            $table->string('name');
            $table->string('brand');
            $table->string('model');
            $table->integer('year'); // Year of manufacture
            $table->string('car_type'); // e.g., SUV, Sedan
            $table->decimal('daily_rent_price', 8, 2); // Rent price per day
            $table->boolean('availability')->default(true); // Availability (true/false)
            $table->string('image')->nullable(); // Image of the car
            $table->text('description')->nullable(); // Optional description of the car
            $table->integer('number_of_seats')->nullable(); // Optional number of seats
            $table->timestamps(); // created_at and updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('cars');
    }
}
