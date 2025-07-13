@extends('layouts.app')
@section('content')
<div class="container">
    <h2>{{ isset($order) ? 'تعديل' : 'إضافة' }} طلب</h2>
    <form action="{{ isset($order) ? route('orders.update', $order->order_id) : route('orders.store') }}" method="POST">
        @csrf
        @if(isset($order)) @method('PUT') @endif
        <div class="mb-3">
            <label>العميل</label>
            <select name="customer_id" class="form-control" required>
                @foreach($customers as $customer)
                <option value="{{ $customer->customer_id }}" {{ isset($order) && $order->customer_id == $customer->customer_id ? 'selected' : '' }}>
                    {{ $customer->name }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>التاريخ</label>
            <input type="date" name="order_date" class="form-control" value="{{ $order->order_date ?? '' }}" required>
        </div>
        <div class="mb-3">
            <label>الحالة</label>
            <input type="text" name="status" class="form-control" value="{{ $order->status ?? '' }}" required>
        </div>
        <button class="btn btn-primary">{{ isset($order) ? 'تحديث' : 'حفظ' }}</button>
    </form>
</div>
@endsection
