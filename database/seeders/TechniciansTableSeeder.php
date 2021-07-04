<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Technician;

class TechniciansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Technician::truncate();
        $technician = new Technician();
        $technician->first_name = 'Tech 1';
        $technician->last_name = 'Last 1';
        $technician->truck_number = '100';
        $technician->save();

        $technician = new Technician();
        $technician->first_name = 'Tech 2';
        $technician->last_name = 'Last 2';
        $technician->truck_number = '200';
        $technician->save();

        $technician = new Technician();
        $technician->first_name = 'Tech 3';
        $technician->last_name = 'Last 3';
        $technician->truck_number = '300';
        $technician->save();
    }
}
