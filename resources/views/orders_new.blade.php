@extends('template')
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="{{ asset('../resources/js/createEditOrder.js') }}"></script>

@section('content')
<h1>Create Order</h1>

<form action={{ route('orders_new') }} method='POST'>
  @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Vehicle</label>
    <select class="form-select" aria-label="Default select example" name="vehicle_id" id="vehicle_id">
      <option selected value="" onchange="changeVehicle">--Select Vehicle--</option>
      @foreach ($vehicles as $vehicle)
        <option value="{{ $vehicle['id'] }}" {{ old('vehicle_id') == $vehicle['id'] ? "selected" : "" }}>
          {{ $vehicle['make'] }} {{ $vehicle['model'] }} {{ $vehicle['year'] }} {{ $vehicle['vin'] }}
        </option>    
      @endforeach
    </select>
    @error('vehicle_id')
      <br>
      <small>*{{ $message }}</small>
      <br>
    @enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Key</label>
    <select class="form-select" aria-label="Default select example" name="key_id">
      <option selected value="1">--Select Key--</option>
    </select>
    <div id="emailHelp" class="form-text">You must select a vehicle first</div>
    @error('key_id')
      <br>
      <small>*{{ $message }}</small>
      <br>
    @enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Technician</label>
    <select class="form-select" aria-label="Default select example"  name="technician_id">
      <option selected value="">--Select Technician--</option>
      @foreach ($technicians as $technician)
        <option value="{{ $technician['id'] }}" {{ old('technician_id') == $technician['id'] ? "selected" : "" }}>
          {{ $technician['last_name'] }} {{ $technician['first_name'] }}
        </option>
      @endforeach
    </select>
    @error('technician_id')
      <br>
      <small>*{{ $message }}</small>
      <br>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection