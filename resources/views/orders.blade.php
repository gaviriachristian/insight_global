@extends('template')
@section('content')
<h1>Orders</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#id</th>
      <th scope="col">Vehicle Make</th>
      <th scope="col">Vehicle Model</th>
      <th scope="col">Vehicle Year</th>
      <th scope="col">Key Name</th>
      <th scope="col">Key Description</th>
      <th scope="col">Key Price</th>
      <th scope="col">Technician First Name</th>
      <th scope="col">Technician Last Name</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($orders as $order)
        @foreach ($order->vehicle->keys as $index=>$key)
        <tr>
            @if (!$index)
          <th class="align-middle" scope="row" rowspan="{{ count($order->vehicle->keys) }}">{{ $order->id }}</th>
          <td class="align-middle" rowspan="{{ count($order->vehicle->keys) }}">{{ $order->vehicle->make }}</td>
          <td class="align-middle" rowspan="{{ count($order->vehicle->keys) }}">{{ $order->vehicle->model }}</td>
          <td class="align-middle" rowspan="{{ count($order->vehicle->keys) }}">{{ $order->vehicle->year }}</td>
          @endif
          <td>{{ $key->name }}</td>
          <td>{{ $key->description }}</td>
          <td>{{ $key->price }}</td>
          @if (!$index)
          <td class="align-middle" rowspan="{{ count($order->vehicle->keys) }}">{{ $order->technician->first_name }}</td>
          <td class="align-middle" rowspan="{{ count($order->vehicle->keys) }}">{{ $order->technician->last_name }}</td>
          <td class="align-middle" rowspan="{{ count($order->vehicle->keys) }}">{{ $order->created_at }}</td>
          @endif
        </tr>
        @endforeach
    @endforeach
  </tbody>
</table>
@endsection