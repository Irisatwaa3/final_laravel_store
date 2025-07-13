@extends('layouts.app')

@section('content')
<div class="container py-5 text-center">

    <!-- Hero Section -->
    <h1 class="display-4 fw-bold mb-3">Welcome to YourStore</h1>
    <p class="lead mb-4">Manage your orders, payments, shipping, and more efficiently.</p>

    <div class="mb-4">
        <a href="{{ route('login') }}" class="btn btn-primary btn-lg mx-2">Login</a>
        <a href="{{ route('register') }}" class="btn btn-outline-primary btn-lg mx-2">Register</a>
    </div>

    <!-- Optional Features Section -->
    <div class="row text-center mt-5">
        <div class="col-md-4">
            <i class="bi bi-cart-check" style="font-size: 3rem; color: #0d6efd;"></i>
            <h3 class="my-3">Manage Orders</h3>
            <p>Track and process orders easily.</p>
        </div>
        <div class="col-md-4">
            <i class="bi bi-cash-stack" style="font-size: 3rem; color: #0d6efd;"></i>
            <h3 class="my-3">Secure Payments</h3>
            <p>Handle payments safely.</p>
        </div>
        <div class="col-md-4">
            <i class="bi bi-truck" style="font-size: 3rem; color: #0d6efd;"></i>
            <h3 class="my-3">Fast Shipping</h3>
            <p>Manage your shipments and deliveries.</p>
        </div>
    </div>
</div>
@endsection
