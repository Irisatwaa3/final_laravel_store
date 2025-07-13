@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Order Item Details #{{ $order_item->order_item_id }}</h2>
    <table class="table table-striped">
        <tr>
            <th>Order ID</th>
            <td>{{ $order_item->order_id }}</td>
        </tr>
        <tr>
            <th>Product ID</th>
            <td>{{ $order_item->product_id }}</td>
        </tr>
        <tr>
            <th>Quantity</th>
            <td>{{ $order_item->quantity }}</td>
        </tr>
        <tr>
            <th>Created At</th>
            <td>{{ $order_item->created_at->diffForHumans() }}</td>
        </tr>
        <tr>
            <th>Updated At</th>
            <td>{{ $order_item->updated_at->diffForHumans() }}</td>
        </tr>
    </table>
    <a href="{{ route('order_items.index') }}" class="btn btn-secondary">Back to list</a>
</div>
@endsection
