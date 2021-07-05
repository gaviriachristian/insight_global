@extends('template')

@section('content')
<h1>Orders</h1>

<form class="row g-3" action={{ route('orders_list') }} method='GET'>
  <div class="col-auto m-3">
    <div class="form-check">
      <input class="form-check-input" type="radio" name="search_type" id="flexRadioDefault1" checked value="vehicle"
      {{ $search_type == "vehicle" ? "checked" : "" }}>
      <label class="form-check-label" for="flexRadioDefault1">
        Vehicle Make
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="search_type" id="flexRadioDefault2" value="key"
      {{ $search_type == "key" ? "checked" : "" }}>
      <label class="form-check-label" for="flexRadioDefault2">
        Key Name
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="search_type" id="flexRadioDefault3" value="technician"
      {{ $search_type == "technician" ? "checked" : "" }}>
      <label class="form-check-label" for="flexRadioDefault3">
        Technician Name
      </label>
    </div>
  </div>
  <div class="col-auto m-3">
    <input type="text" class="form-control" name="search_query" placeholder="Search..." value="{{ $search_query }}">
  </div>
  <div class="col-auto m-3">
    <button type="submit" class="btn btn-primary mb-3">Filter</button>
  </div>
</form>

<table class="table">
  <thead>
    <tr>
      <th scope="col" class="text-center">ID</th>
      <th scope="col" class="text-center">Vehicle<br>Make</th>
      <th scope="col" class="text-center">Vehicle<br>Model</th>
      <th scope="col" class="text-center">Vehicle<br>Year</th>
      <th scope="col" class="text-center">Key<br>Name</th>
      <th scope="col" class="text-center">Key<br>Description</th>
      <th scope="col" class="text-center">Key<br>Price</th>
      <th scope="col" class="text-center">Technician<br>First Name</th>
      <th scope="col" class="text-center">Technician<br>Last Name</th>
      <th scope="col" class="text-center">Date</th>
      <th scope="col" class="text-center">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($data as $order)
      <tr>
        <th class="text-center align-middle" scope="row">{{ $order['id'] }}</th>
        <td class="text-center align-middle">{{ $order['vehicle']['make'] }}</td>
        <td class="text-center align-middle">{{ $order['vehicle']['model'] }}</td>
        <td class="text-center align-middle">{{ $order['vehicle']['year'] }}</td>

        <td class="text-center">{{ $order['key']['name'] }}</td>
        <td class="text-center">{{ $order['key']['description'] }}</td>
        <td class="text-center">{{ $order['key']['price'] }}</td>

        <td class="text-center align-middle">{{ $order['technician']['first_name'] }}</td>
        <td class="text-center align-middle">{{ $order['technician']['last_name'] }}</td>
        <td class="text-center align-middle">{{ explode('T', $order['created_at'])[0] }}</td>
        <td class="text-center align-middle">
          <a class="btn btn-warning" href="{{ route('orders_edit', $order['id']) }}">Edit</a> | 
          <a class="btn btn-danger" href="{{ route('orders_delete', $order['id']) }}">Delete</a>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
@endsection