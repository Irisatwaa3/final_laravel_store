@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Order Item</h2>
    <form action="{{ route('order_items.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="order_id" class="form-label">Order ID</label>
            <input type="number" name="order_id" id="order_id" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="product_id" class="form-label">Product ID</label>
            <input type="number" name="product_id" id="product_id" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" name="quantity" id="quantity" class="form-control" required min="1">
        </div>

        <button type="submit" class="btn btn-primary">Save Order Item</button>
        <a href="{{ route('order_items.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
