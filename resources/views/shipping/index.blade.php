@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Shipping</h2>
    <a href="{{ route('shipping.create') }}" class="btn btn-success mb-3">Add New Shipping</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Order ID</th>
                <th>Shipping Address</th>
                <th>Shipping Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($shipping as $ship)
            <tr>
                <td>{{ $ship->shipping_id }}</td>
                <td>{{ $ship->order_id }}</td>
                <td>{{ $ship->shipping_address }}</td>
                <td>{{ $ship->shipping_date->format('Y-m-d') }}</td>
                <td>
                    <a href="{{ route('shipping.show', $ship->shipping_id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('shipping.edit', $ship->shipping_id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('shipping.destroy', $ship->shipping_id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
