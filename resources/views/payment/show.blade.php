@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Payment Details #{{ $payment->payment_id }}</h2>
    <table class="table table-striped">
        <tr>
            <th>Order ID</th>
            <td>{{ $payment->order_id }}</td>
        </tr>
        <tr>
            <th>Amount</th>
            <td>{{ $payment->amount }}</td>
        </tr>
        <tr>
            <th>Payment Date</th>
            <td>{{ $payment->payment_date->format('Y-m-d') }}</td>
        </tr>
        <tr>
            <th>Payment Method</th>
            <td>{{ $payment->payment_method }}</td>
        </tr>
        <tr>
            <th>Created At</th>
            <td>{{ $payment->created_at->diffForHumans() }}</td>
        </tr>
        <tr>
            <th>Updated At</th>
            <td>{{ $payment->updated_at->diffForHumans() }}</td>
        </tr>
    </table>
    <a href="{{ route('payments.index') }}" class="btn btn-secondary">Back to list</a>
</div>
@endsection
