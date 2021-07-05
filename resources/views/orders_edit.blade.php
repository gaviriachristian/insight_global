@extends('template')
@section('content')
<h1>Edit Order</h1>

<form action={{ route('orders_update', $id) }} method='POST'>
  @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Vehicle</label>
    <select class="form-select" aria-label="Default select example" name="vehicle_id">
      @foreach ($vehicles as $vehicle)
        <option value="{{ $vehicle['id'] }}" {{ ($selectedVehicle ==  $vehicle['id'] ? "selected":"") }}>{{ $vehicle['make'] }} {{ $vehicle['model'] }} {{ $vehicle['year'] }} {{ $vehicle['vin'] }}</option>    
      @endforeach
    </select>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Key</label>
    <select class="form-select" aria-label="Default select example" name="key_id">
      <option>--Select a vehicle--</option>
    </select>
    <div id="emailHelp" class="form-text">You must select a vehicle first</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Technician</label>
    <select class="form-select" aria-label="Default select example"  name="technician_id">
      @foreach ($technicians as $technician)
        <option value="{{ $technician['id'] }}" {{ ($selectedTechnician ==  $technician['id'] ? "selected":"") }}>{{ $technician['last_name'] }} {{ $technician['first_name'] }}</option>    
      @endforeach
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection