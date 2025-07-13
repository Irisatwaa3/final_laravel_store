@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Shipping Details #{{ $shipping->shipping_id }}</h2>
    <table class="table table-striped">
        <tr>
            <th>Order ID</th>
            <td>{{ $shipping->order_id }}</td>
        </tr>
        <tr>
            <th>Shipping Address</th>
            <td>{{ $shipping->shipping_address }}</td>
        </tr>
        <tr>
            <th>Shipping Date</th>
            <td>{{ $shipping->shipping_date->format('Y-m-d') }}</td>
        </tr>
        <tr>
            <th>Created At</th>
            <td>{{ $shipping->created_at->diffForHumans() }}</td>
        </tr>
        <tr>
            <th>Updated At</th>
            <td>{{ $shipping->updated_at->diffForHumans() }}</td>
        </tr>
    </table>
    <a href="{{ route('shipping.index') }}" class="btn btn-secondary">Back to list</a>
</div>
@endsection
