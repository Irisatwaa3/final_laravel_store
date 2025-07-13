<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ShopController;
use App\Models\Category;
use App\Models\Product;
use OrderController as GlobalOrderController;

// الصفحة الرئيسية (محمي بـ auth)
Route::get('/', function () {
    return view('home');
})->name('home')->middleware('auth');

// تسجيل الدخول والخروج
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// صفحة التسجيل
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// لوحة تحكم الأدمن
// عرض المستخدمين وتعديل صلاحياتهم
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/users', [CustomerController::class, 'index'])->name('admin.users.index');
    Route::post('/admin/users/{user}/update-role', [CustomerController::class, 'updateRole'])->name('admin.users.updateRole');
});


// صفحات المتجر والطلبات للمستخدمين المسجلين
Route::middleware(['auth'])->group(function () {

    // صفحة المتجر الرئيسية (كل الفئات والمنتجات)
    Route::get('/shop', function () {
        $categories = Category::all();
        $products = Product::all();
        return view('shop.home', compact('categories', 'products'));
    })->name('shop.home');

    // صفحة عرض المنتجات حسب فئة معينة
    Route::get('/shop/category/{id}', [ShopController::class, 'showCategory'])->name('shop.category');

    // صفحة عربة التسوق / الطلبات
    Route::get('/orders', [OrderController::class, 'index'])->name('shop.orders');
});
