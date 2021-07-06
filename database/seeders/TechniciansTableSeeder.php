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
        $technician->first_name = 'Jhon';
        $technician->last_name = 'Doe';
        $technician->truck_number = '100';
        $technician->save();

        $technician = new Technician();
        $technician->first_name = 'Jhosep';
        $technician->last_name = 'Simpson';
        $technician->truck_number = '200';
        $technician->save();

        $technician = new Technician();
        $technician->first_name = 'Christian';
        $technician->last_name = 'Gaviria';
        $technician->truck_number = '300';
        $technician->save();
    }
}
