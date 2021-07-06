<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Order::truncate();
        $order = new Order();
        $order->vehicle_id = 3;
        $order->key_id = 3;
        $order->technician_id = 1;
        $order->save();

        $order = new Order();
        $order->vehicle_id = 2;
        $order->key_id = 1;
        $order->technician_id = 1;
        $order->save();

        $order = new Order();
        $order->vehicle_id = 1;
        $order->key_id = 2;
        $order->technician_id = 2;
        $order->save();
    }
}
