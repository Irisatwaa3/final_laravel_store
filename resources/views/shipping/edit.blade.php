@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Shipping #{{ $shipping->shipping_id }}</h2>
    <form action="{{ route('shipping.update', $shipping->shipping_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="order_id" class="form-label">Order ID</label>
            <input type="number" name="order_id" id="order_id" class="form-control" value="{{ $shipping->order_id }}" required>
        </div>

        <div class="mb-3">
            <label for="shipping_address" class="form-label">Shipping Address</label>
            <textarea name="shipping_address" id="shipping_address" class="form-control" rows="3" required>{{ $shipping->shipping_address }}</textarea>
        </div>

        <div class="mb-3">
            <label for="shipping_date" class="form-label">Shipping Date</label>
            <input type="date" name="shipping_date" id="shipping_date" class="form-control" value="{{ $shipping->shipping_date->format('Y-m-d') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Shipping</button>
        <a href="{{ route('shipping.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
