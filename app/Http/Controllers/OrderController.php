<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->filled('search_query')) {
            $search_type = $request->search_type;
            $search_query = $request->search_query;

            $queryFilter = DB::table('orders')->select('orders.*');

            switch ($search_type) {
                case "vehicle":
                    $orders = $queryFilter->join('vehicles', 'vehicles.id', '=', 'orders.vehicle_id')
                                ->where('make', 'LIKE', '%' . $search_query . '%')
                                ->get();
                    break;
                
                case "key":
                    $orders = $queryFilter->join('keys', 'keys.id', '=', 'orders.key_id')
                                ->where('name', 'LIKE', '%' . $search_query . '%')
                                ->get();
                    break;

                case "technician":
                    $orders = $queryFilter->join('technicians', 'technicians.id', '=', 'orders.technician_id')
                                ->where('last_name', 'LIKE', '%' . $search_query . '%')
                                ->orWhere('first_name', 'LIKE', '%' . $search_query . '%')
                                ->get();
                    break;
                default:
                    $orders = Order::all();
            }
        }
        else {
            $orders = Order::all();
        }
        return \response($orders);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'vehicle_id' => 'required|numeric',
            'key_id' => 'required|numeric',
            'technician_id' => 'required|numeric'
        ]);

        $order = Order::create($request->all());
        return \response(json_encode(
            [
                'success' => 1,
                'message' => 'New Order created: Id ' . $order->id
            ]
        ));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);
        return \response($order);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'vehicle_id' => 'required|numeric',
            'key_id' => 'required|numeric',
            'technician_id' => 'required|numeric'
        ]);
        Order::findOrFail($id)->update($request->all());
        return \response(json_encode(
            [
                'success' => 1,
                'message' => 'Updated Order ' . $id
            ]
        ));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Order::destroy($id);
        return \response(json_encode(
            [
                'success' => 1,
                'message' => 'Deleted Order ' . $id
            ]
        ));
    }

    public function list(Request $request)
    {
        $search_type = $request->search_type;
        $search_query = $request->search_query;

        $data = [];

        // Get Order
        $orderResponse = Http::get(route('orders.index') . '?search_type=' . $search_type . '&search_query=' . $search_query);
        $orders = $orderResponse->json();

        foreach ($orders as $order){
            // Get Vehicle
            $vehicleResponse = Http::get(route('vehicles.index') . '/' . $order['vehicle_id']);
            $vehicle = $vehicleResponse->json();

            // Get Vehicle
            $keyResponse = Http::get(route('keys.index') . '/' . $order['key_id']);
            $key = $keyResponse->json();

            // Get Technician
            $technicianResponse = Http::get(route('technicians.index') . '/' . $order['technician_id']);
            $technician = $technicianResponse->json();
            
            $order['vehicle'] = $vehicle;
            $order['key'] = $key;
            $order['technician'] = $technician;
            $data[] = $order;
        }

        return view('orders', compact('data', 'search_type', 'search_query'));
    }

    public function create()
    {
        // Get Vehicles
        $vehiclesResponse = Http::get(route('vehicles.index'));
        $vehicles = $vehiclesResponse->json();

        // Get Technicians
        $techniciansResponse = Http::get(route('technicians.index'));
        $technicians = $techniciansResponse->json();

        return view('orders_new', compact('vehicles', 'technicians'));
    }

    public function edit($id)
    {
        // Get Order
        $orderResponse = Http::get(route('orders.show', $id));
        $order = $orderResponse->json();

        $selectedVehicle = $order['vehicle_id'];
        $selectedKey = $order['key_id'];
        $selectedTechnician = $order['technician_id'];

        // Get Vehicles
        $vehiclesResponse = Http::get(route('vehicles.index'));
        $vehicles = $vehiclesResponse->json();

        // Get Keys
        $keysResponse = Http::get(route('keys.index'). '?vehicle=' . $selectedVehicle);
        $keys = $keysResponse->json();

        // Get Technicians
        $techniciansResponse = Http::get(route('technicians.index'));
        $technicians = $techniciansResponse->json();

        return view('orders_edit', compact('id', 'vehicles', 'keys', 'technicians', 'selectedVehicle', 'selectedKey', 'selectedTechnician'));
    }

    public function delete($id)
    {
        Http::delete(route('orders.destroy', $id));
        return redirect()->route('orders_list');
    }

    public function newOrder(Request $request) {
        $request->validate([
            'vehicle_id' => 'required|numeric',
            'key_id' => 'required|numeric',
            'technician_id' => 'required|numeric'
        ]);
        Http::post(route('orders.store'), $request->all());
        return redirect()->route('orders_list');
    }

    public function updateOrder(Request $request, $id)
    {
        $request->validate([
            'vehicle_id' => 'required|numeric',
            'key_id' => 'required|numeric',
            'technician_id' => 'required|numeric'
        ]);
        Http::put(route('orders.update', $id), $request->all());
        return redirect()->route('orders_list');
    }
}
