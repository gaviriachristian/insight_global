@extends('template')

@section('content')
<h1>Create Order</h1>

<form action={{ route('orders_new') }} method='POST'>
  @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Vehicle</label>
    <select class="form-select" aria-label="Default select example" name="vehicle_id" id="selector_vehicles">
      <option selected value="">--Select Vehicle--</option>
      @foreach ($vehicles as $vehicle)
        <option value="{{ $vehicle['id'] }}" {{ old('vehicle_id') == $vehicle['id'] ? "selected" : "" }}>
          {{ $vehicle['make'] }} | {{ $vehicle['model'] }} | {{ $vehicle['year'] }} | {{ $vehicle['vin'] }}
        </option>    
      @endforeach
    </select>
    @error('vehicle_id')
      <br>
      <small class='text-danger'>*{{ $message }}</small>
      <br>
    @enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Key</label>
    <select class="form-select" aria-label="Default select example" name="key_id" id="selector_keys">
      <option selected value="">--Select Key--</option>
    </select>
    <div id="emailHelp" class="form-text">Please select a vehicle first</div>
    @error('key_id')
      <br>
      <small class='text-danger'>*{{ $message }}</small>
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
      <small class='text-danger'>*{{ $message }}</small>
      <br>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<input type="hidden" id="keys_url" value="{{ route('keys.index') }}">
@endsection