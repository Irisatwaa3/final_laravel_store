@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Products</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Add Product</a>
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ $product->image_path ? asset('storage/' . $product->image_path) : 'https://via.placeholder.com/300x200' }}" class="card-img-top" alt="Product Image">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ Str::limit($product->description, 80) }}</p>
                        <p class="fw-bold">${{ $product->price }}</p>
                        <a href="{{ route('products.show', $product) }}" class="btn btn-outline-primary btn-sm">View</a>
                        <a href="{{ route('products.edit', $product) }}" class="btn btn-outline-secondary btn-sm">Edit</a>
                        <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
