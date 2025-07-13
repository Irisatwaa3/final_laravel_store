@extends('layouts.app')
@section('content')
<div class="container">
    <h2>تفاصيل الطلب</h2>
    <p><strong>العميل:</strong> {{ $order->customer?->name }}</p>
    <p><strong>التاريخ:</strong> {{ $order->order_date }}</p>
    <p><strong>الحالة:</strong> {{ $order->status }}</p>
    <a href="{{ route('orders.index') }}" class="btn btn-secondary">رجوع</a>
</div>
@endsection
