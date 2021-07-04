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
        $vehicle->make = 'M 1';
        $vehicle->model = 'A';
        $vehicle->vin = '123';
        $vehicle->save();

        $vehicle = new Vehicle();
        $vehicle->year = '2012';
        $vehicle->make = 'M 2';
        $vehicle->model = 'B';
        $vehicle->vin = '456';
        $vehicle->save();

        $vehicle = new Vehicle();
        $vehicle->year = '2013';
        $vehicle->make = 'M 3';
        $vehicle->model = 'C';
        $vehicle->vin = '789';
        $vehicle->save();
    }
}
