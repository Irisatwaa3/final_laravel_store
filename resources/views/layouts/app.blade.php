<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'متجرنا')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold text-primary" href="{{ route('shop.home') }}">متجرنا</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="تبديل التنقل">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('shop.home') ? 'active' : '' }}" href="{{ route('shop.home') }}">الرئيسية</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->is('shop*') ? 'active' : '' }}" href="#" id="categoriesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        الفئات
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="categoriesDropdown">
                        @foreach($categories as $category)
                            <li><a class="dropdown-item" href="{{ route('shop.category', $category->id) }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('shop.orders') ? 'active' : '' }}" href="{{ route('shop.orders') }}">عربة التسوق</a>
                </li>
                @guest
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">تسجيل الدخول</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">إنشاء حساب</a></li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="dropdown-item" type="submit">تسجيل الخروج</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

<main class="py-4">
    @yield('content')
</main>

<footer class="bg-light text-center py-4 mt-auto border-top">
    <div class="container">
        <p class="mb-0 text-muted">جميع الحقوق محفوظة &copy; {{ date('Y') }} متجرنا الإلكتروني</p>
    </div>
</footer>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<style>
/* يمكن وضع CSS الخاص بالفئات والبطاقات هنا أو في ملف CSS خارجي */
.category-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border: 1px solid #e3e6f0;
    box-shadow: 0 2px 6px rgba(13, 110, 253, 0.1);
}
.category-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 8px 20px rgba(13, 110, 253, 0.3);
    border-color: #0d6efd;
    background-color: #f0f7ff;
    color: #0d6efd;
    text-decoration: none !important;
}
.category-card:hover .category-name {
    color: #0d6efd;
}
.icon-wrapper svg {
    transition: transform 0.3s ease, fill 0.3s ease;
}
.category-card:hover .icon-wrapper svg {
    transform: scale(1.2);
    fill: #0a58ca;
}
.category-name {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
</style>

</body>
</html>
