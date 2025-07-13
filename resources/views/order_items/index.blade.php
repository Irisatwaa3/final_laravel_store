@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Order Items</h2>
    <a href="{{ route('order_items.create') }}" class="btn btn-success mb-3">Add New Order Item</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Order ID</th>
                <th>Product ID</th>
                <th>Quantity</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order_items as $item)
            <tr>
                <td>{{ $item->order_item_id }}</td>
                <td>{{ $item->order_id }}</td>
                <td>{{ $item->product_id }}</td>
                <td>{{ $item->quantity }}</td>
                <td>
                    <a href="{{ route('order_items.show', $item->order_item_id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('order_items.edit', $item->order_item_id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('order_items.destroy', $item->order_item_id) }}" method="POST" style="display:inline-block;">
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
