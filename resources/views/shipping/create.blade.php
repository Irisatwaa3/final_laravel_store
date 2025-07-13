@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Shipping</h2>
    <form action="{{ route('shipping.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="order_id" class="form-label">Order ID</label>
            <input type="number" name="order_id" id="order_id" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="shipping_address" class="form-label">Shipping Address</label>
            <textarea name="shipping_address" id="shipping_address" class="form-control" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="shipping_date" class="form-label">Shipping Date</label>
            <input type="date" name="shipping_date" id="shipping_date" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Save Shipping</button>
        <a href="{{ route('shipping.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
