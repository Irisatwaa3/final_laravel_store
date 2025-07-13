<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // عرض صفحة التسجيل
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // معالجة التسجيل
   public function register(Request $request)
{
    // تحقق من صحة البيانات
    $validated = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:customers'],
        'phone' => ['required', 'string', 'max:20'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);

    // إنشاء المستخدم الجديد
    Customer::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'phone' => $validated['phone'],
        'password' => Hash::make($validated['password']),
        'role' => 'customer', // ← هذا هو السطر الذي يحدد نوع المستخدم كـ "مستخدم عادي"
    ]);

    // إعادة التوجيه إلى صفحة تسجيل الدخول
    return redirect()->route('login')->with('success', 'Account created successfully! Please log in.');
}

}
