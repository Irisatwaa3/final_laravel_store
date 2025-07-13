@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Order Item #{{ $order_item->order_item_id }}</h2>
    <form action="{{ route('order_items.update', $order_item->order_item_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="order_id" class="form-label">Order ID</label>
            <input type="number" name="order_id" id="order_id" class="form-control" value="{{ $order_item->order_id }}" required>
        </div>

        <div class="mb-3">
            <label for="product_id" class="form-label">Product ID</label>
            <input type="number" name="product_id" id="product_id" class="form-control" value="{{ $order_item->product_id }}" required>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" name="quantity" id="quantity" class="form-control" value="{{ $order_item->quantity }}" required min="1">
        </div>

        <button type="submit" class="btn btn-primary">Update Order Item</button>
        <a href="{{ route('order_items.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
