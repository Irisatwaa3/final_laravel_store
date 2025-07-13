<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        // تحقق من صحة البيانات
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:customers,email',
            'phone'    => 'required|string|max:20',
            'password' => 'required|string|min:6|confirmed', // يتطلب حقل password_confirmation
        ]);

        // إنشاء المستخدم
        $customer = Customer::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'password' => Hash::make($request->password),
            'role'     => 'customer', // أو حسب النظام
        ]);

        // توليد توكن
        $token = $customer->createToken('api-token')->plainTextToken;

        // إرجاع البيانات
        return response()->json([
            'message' => 'Registration successful',
            'token'   => $token,
            'customer'=> $customer,
        ], 201);
    }
}
