@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Category Details #{{ $category->category_id }}</h2>
    <table class="table table-striped">
        <tr>
            <th>Name</th>
            <td>{{ $category->name }}</td>
        </tr>
        <tr>
            <th>Created At</th>
            <td>{{ $category->created_at->diffForHumans() }}</td>
        </tr>
        <tr>
            <th>Updated At</th>
            <td>{{ $category->updated_at->diffForHumans() }}</td>
        </tr>
    </table>
    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back to list</a>
</div>
@endsection
