@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Payments</h2>
    <a href="{{ route('payments.create') }}" class="btn btn-success mb-3">Add New Payment</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Order ID</th>
                <th>Amount</th>
                <th>Payment Date</th>
                <th>Payment Method</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payments as $payment)
            <tr>
                <td>{{ $payment->payment_id }}</td>
                <td>{{ $payment->order_id }}</td>
                <td>{{ $payment->amount }}</td>
                <td>{{ $payment->payment_date->format('Y-m-d') }}</td>
                <td>{{ $payment->payment_method }}</td>
                <td>
                    <a href="{{ route('payments.show', $payment->payment_id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('payments.edit', $payment->payment_id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('payments.destroy', $payment->payment_id) }}" method="POST" style="display:inline-block;">
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
