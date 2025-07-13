@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2>منتجات فئة: {{ $category->name }}</h2>

    <div class="row g-4">
        @forelse($products as $product)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card h-100 shadow-sm border-0">
                    @if($product->image_path)
                        <img src="{{ asset('storage/' . $product->image_path) }}" class="card-img-top" alt="{{ $product->name }}">
                    @else
                        <img src="https://via.placeholder.com/300x200?text=No+Image" class="card-img-top" alt="No Image">
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text text-truncate">{{ $product->description }}</p>
                        <div class="mt-auto d-flex justify-content-between align-items-center">
                            <span class="fw-bold text-primary">{{ number_format($product->price, 2) }} $</span>
                            <a href="#" class="btn btn-sm btn-outline-primary">أضف إلى السلة</a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p>لا توجد منتجات في هذه الفئة حالياً.</p>
        @endforelse
    </div>
</div>
@endsection
