@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Payment</h2>
    <form action="{{ route('payments.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="order_id" class="form-label">Order ID</label>
            <input type="number" name="order_id" id="order_id" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="number" step="0.01" name="amount" id="amount" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="payment_date" class="form-label">Payment Date</label>
            <input type="date" name="payment_date" id="payment_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="payment_method" class="form-label">Payment Method</label>
            <input type="text" name="payment_method" id="payment_method" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Save Payment</button>
        <a href="{{ route('payments.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
