<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Key;

class KeyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->filled('vehicle')) {
            $vehicle_id = $request->vehicle;
            $keys = Key::wherehas('vehicles', function($query) use($vehicle_id) {
                        $query->where('vehicle_id', $vehicle_id);
                    })->get();
        } else {
            $keys = Key::all();
        }
        return \response($keys);
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
            'vehicle_id' => 'required',
            'technician_id' => 'required'
        ]);

        $key = Key::create($request->all());
        return \response($key);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $key = Key::findOrFail($id);
        return \response($key);
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
        Key::findOrFail($id)->update($request->all());
        return \response(json_encode(
            [
                'success' => 1,
                'message' => 'Updated Key ' . $id
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
        Key::destroy($id);
        return \response(json_encode(
            [
                'success' => 1,
                'message' => 'Deleted Key ' . $id
            ]
        ));
    }
}
