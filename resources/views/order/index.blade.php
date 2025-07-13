@extends('layouts.app')
@section('content')
<div class="container">
    <h2>الطلبات</h2>
    <a href="{{ route('orders.create') }}" class="btn btn-success mb-3">إضافة طلب</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>الرقم</th>
                <th>العميل</th>
                <th>التاريخ</th>
                <th>الحالة</th>
                <th>إجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->order_id }}</td>
                <td>{{ $order->customer?->name }}</td>
                <td>{{ $order->order_date }}</td>
                <td>{{ $order->status }}</td>
                <td>
                    <a href="{{ route('orders.show', $order->order_id) }}" class="btn btn-info btn-sm">عرض</a>
                    <a href="{{ route('orders.edit', $order->order_id) }}" class="btn btn-warning btn-sm">تعديل</a>
                    <form action="{{ route('orders.destroy', $order->order_id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm">حذف</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
