<?php

namespace App\Http\Controllers;  // << هنا

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        // هنا يمكنك جلب طلبات المستخدم الحالية مثلاً
        // $orders = auth()->user()->orders; // لو عندك علاقة الطلبات
        return view('shop.orders');  // أنشئ هذا الملف لاحقًا
    }
}
