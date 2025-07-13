
<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\CustomerController;
use App\Http\Controllers\API\ShopController;
use App\Http\Controllers\API\OrderController;
use Illuminate\Http\Request;

// تسجيل الدخول والخروج
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

// تسجيل مستخدم جديد
Route::post('/register', [RegisterController::class, 'register']);

// المسارات المحمية
Route::middleware(['auth:sanctum'])->group(function () {

    // بيانات المستخدم الحالي
    Route::get('/user', function (Request $request) {
        return response()->json($request->user());
    });

    // صفحات المتجر
    Route::get('/shop', [ShopController::class, 'index']); // كل الفئات والمنتجات
    Route::get('/shop/category/{id}', [ShopController::class, 'showCategory']);

    // الطلبات (عربة التسوق)
    Route::get('/orders', [OrderController::class, 'index']);

    // لوحة تحكم الأدمن
    Route::middleware(['admin'])->group(function () {
        Route::get('/admin/users', [CustomerController::class, 'index']);
        Route::post('/admin/users/{user}/update-role', [CustomerController::class, 'updateRole']);
    });
});

