@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Payment #{{ $payment->payment_id }}</h2>
    <form action="{{ route('payments.update', $payment->payment_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="order_id" class="form-label">Order ID</label>
            <input type="number" name="order_id" id="order_id" class="form-control" value="{{ $payment->order_id }}" required>
        </div>

        <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="number" step="0.01" name="amount" id="amount" class="form-control" value="{{ $payment->amount }}" required>
        </div>

        <div class="mb-3">
            <label for="payment_date" class="form-label">Payment Date</label>
            <input type="date" name="payment_date" id="payment_date" class="form-control" value="{{ $payment->payment_date->format('Y-m-d') }}" required>
        </div>

        <div class="mb-3">
            <label for="payment_method" class="form-label">Payment Method</label>
            <input type="text" name="payment_method" id="payment_method" class="form-control" value="{{ $payment->payment_method }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Payment</button>
        <a href="{{ route('payments.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
