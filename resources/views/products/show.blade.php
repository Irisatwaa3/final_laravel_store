@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">{{ $product->name }}</h2>
    <div class="card">
        @if($product->image_path)
            <img src="{{ asset('storage/' . $product->image_path) }}" class="card-img-top" alt="Product Image">
        @endif
        <div class="card-body">
            <h5 class="card-title">{{ $product->name }}</h5>
            <p class="card-text">{{ $product->description }}</p>
            <p class="fw-bold">${{ $product->price }}</p>
            <a href="{{ route('products.edit', $product) }}" class="btn btn-outline-secondary">Edit</a>
            <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection
