@extends('layouts.app')

@section('content')
<div class="container">
    <h2>العملاء</h2>
    <a href="{{ route('customers.create') }}" class="btn btn-success mb-3">إضافة عميل</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>الرقم</th>
                <th>الاسم</th>
                <th>البريد</th>
                <th>الهاتف</th>
                <th>إجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $customer)
            <tr>
                <td>{{ $customer->customer_id }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->phone }}</td>
                <td>
                    <a href="{{ route('customers.show', $customer->customer_id) }}" class="btn btn-info btn-sm">عرض</a>
                    <a href="{{ route('customers.edit', $customer->customer_id) }}" class="btn btn-warning btn-sm">تعديل</a>
                    <form action="{{ route('customers.destroy', $customer->customer_id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">حذف</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
