<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentalsTable extends Migration
{
    public function up()
    {
        Schema::create('rentals', function (Blueprint $table) {
            $table->bigIncrements('id'); // BIGINT primary key
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key to users table
            $table->foreignId('car_id')->constrained()->onDelete('cascade'); // Foreign key to cars table
            $table->date('start_date'); // Rental start date
            $table->date('end_date'); // Rental end date
            $table->decimal('total_cost', 8, 2); // Total cost of the rental
            $table->string('status')->default('ongoing'); // Status: ongoing, completed, canceled
            $table->timestamps(); // created_at and updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('rentals');
    }
}
