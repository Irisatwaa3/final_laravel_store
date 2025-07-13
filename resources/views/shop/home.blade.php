@extends('layouts.app')

@section('content')
<div class="container py-5">

    {{-- قسم تصفح الفئات --}}
    <section class="mb-5">
        <h3 class="mb-4 text-center fw-bold text-primary border-bottom pb-2" style="max-width: 300px; margin:auto;">
            تصفح الفئات
        </h3>
        <div class="row g-4 justify-content-center">
            @foreach($categories as $category)
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <a href="{{ route('shop.category', $category->id) }}"
                       class="category-card d-block text-center p-4 rounded shadow-sm bg-white text-decoration-none h-100 d-flex flex-column align-items-center justify-content-center border border-1"
                       style="transition: all 0.3s ease;">
                        <div class="icon-wrapper mb-3 mx-auto" style="width: 64px; height: 64px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="#0d6efd" class="bi bi-tags" viewBox="0 0 16 16">
                                <path d="M3 2a1 1 0 0 0-1 1v4.586a1 1 0 0 0 .293.707l6.414 6.414a1 1 0 0 0 1.414 0l4.586-4.586a1 1 0 0 0 0-1.414L8.707 2.293A1 1 0 0 0 8 2H3zm5.5 1a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
                            </svg>
                        </div>
                        <h6 class="category-name text-dark fw-semibold mt-auto" style="font-size: 1rem;">
                            {{ $category->name }}
                        </h6>
                    </a>
                </div>
            @endforeach
        </div>
    </section>

    {{-- قسم المنتجات --}}
    <section>
        <h3 class="mb-4 text-center fw-bold text-primary border-bottom pb-2" style="max-width: 250px; margin:auto;">
            منتجاتنا
        </h3>
        <div class="row g-4">
            @foreach($products as $product)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex">
                    <div class="card h-100 shadow border-0 rounded-4 overflow-hidden" style="transition: transform 0.3s ease;">
                        @if($product->image_path)
                            <img src="{{ asset('storage/' . $product->image_path) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 180px; object-fit: cover;">
                        @else
                            <img src="https://via.placeholder.com/300x180?text=No+Image" class="card-img-top" alt="No Image" style="height: 180px; object-fit: cover;">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fs-5 fw-semibold text-truncate" title="{{ $product->name }}">{{ $product->name }}</h5>
                            <p class="card-text text-muted small flex-grow-1" title="{{ $product->description }}">{{ $product->description }}</p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="fw-bold text-primary fs-5">{{ number_format($product->price, 2) }} $</span>
                                <a href="#" class="btn btn-primary btn-sm px-3 shadow-sm" style="border-radius: 25px;">
                                    <i class="bi bi-cart-plus-fill me-1"></i> أضف إلى السلة
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

</div>

{{-- تحسينات CSS --}}
<style>
    .category-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 12px 30px rgba(13, 110, 253, 0.3);
        border-color: #0d6efd;
        background-color: #e7f1ff;
        color: #0d6efd !important;
        text-decoration: none !important;
    }
    .category-card:hover svg {
        transform: scale(1.3);
        fill: #0a58ca !important;
        transition: transform 0.3s ease, fill 0.3s ease;
    }
    .category-name {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .card:hover {
        transform: translateY(-8px);
        box-shadow: 0 10px 25px rgba(13, 110, 253, 0.2);
    }
</style>
@endsection
