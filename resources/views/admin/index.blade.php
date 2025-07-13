@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-center">إدارة المستخدمين</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>الاسم</th>
                <th>البريد الإلكتروني</th>
                <th>الصلاحية</th>
                <th>تعديل</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <form method="POST" action="{{ route('admin.users.updateRole', $user->id) }}">
                            @csrf
                            <select name="role" class="form-select d-inline-block w-auto">
                                <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                            <button type="submit" class="btn btn-sm btn-primary">تحديث</button>
                        </form>
                    </td>
                    <td>
                        {{-- بإمكانك إضافة زر حذف أو عرض تفاصيل المستخدم هنا --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
