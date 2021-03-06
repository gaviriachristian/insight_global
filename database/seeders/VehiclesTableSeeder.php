<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vehicle;

class VehiclesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Vehicle::truncate();
        $vehicle = new Vehicle();
        $vehicle->year = '2011';
        $vehicle->make = 'Ford';
        $vehicle->model = 'Mustang';
        $vehicle->vin = '123';
        $vehicle->save();

        $vehicle = new Vehicle();
        $vehicle->year = '2012';
        $vehicle->make = 'volkswagen';
        $vehicle->model = 'Virtus';
        $vehicle->vin = '456';
        $vehicle->save();

        $vehicle = new Vehicle();
        $vehicle->year = '2013';
        $vehicle->make = 'BMW';
        $vehicle->model = 'A5';
        $vehicle->vin = '789';
        $vehicle->save();
    }
}
