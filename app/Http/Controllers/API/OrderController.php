<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // جلب كل الطلبات الخاصة بالمستخدم الحالي
    public function index()
    {
        $customer = auth('customer')->user();

        if (!$customer) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        // جلب الطلبات الخاصة بهذا العميل
        $orders = Order::where('customer_id', $customer->id)->get();

        return response()->json(['orders' => $orders]);
    }

    // إنشاء طلب جديد
    public function store(Request $request)
    {
        $customer = auth('customer')->user();

        if (!$customer) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        // تحقق من صحة البيانات المطلوبة للطلب (عدّل حسب حقولك)
        $request->validate([
            'product_id' => 'required|integer|exists:products,id',
            'quantity' => 'required|integer|min:1',
            // أضف حقول أخرى حسب الحاجة
        ]);

        $order = new Order();
        $order->customer_id = $customer->id;
        $order->product_id = $request->product_id;
        $order->quantity = $request->quantity;
        // أضف باقي الحقول إذا كان عندك
        $order->status = 'pending'; // مثال: حالة الطلب الافتراضية
        $order->save();

        return response()->json([
            'message' => 'Order created successfully',
            'order' => $order
        ], 201);
    }

    // عرض طلب معين إذا كان يخص المستخدم الحالي
    public function show($id)
    {
        $customer = auth('customer')->user();

        if (!$customer) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $order = Order::where('id', $id)->where('customer_id', $customer->id)->first();

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        return response()->json(['order' => $order]);
    }

    // تحديث طلب معين (مثلاً لتغيير الكمية أو الحالة)
    public function update(Request $request, $id)
    {
        $customer = auth('customer')->user();

        if (!$customer) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $order = Order::where('id', $id)->where('customer_id', $customer->id)->first();

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        $request->validate([
            'quantity' => 'sometimes|integer|min:1',
            'status' => 'sometimes|string|in:pending,processing,completed,canceled',
            // أضف حقول أخرى مسموح بتعديلها
        ]);

        if ($request->has('quantity')) {
            $order->quantity = $request->quantity;
        }
        if ($request->has('status')) {
            $order->status = $request->status;
        }

        $order->save();

        return response()->json([
            'message' => 'Order updated successfully',
            'order' => $order
        ]);
    }

    // حذف طلب معين
    public function destroy($id)
    {
        $customer = auth('customer')->user();

        if (!$customer) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $order = Order::where('id', $id)->where('customer_id', $customer->id)->first();

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        $order->delete();

        return response()->json(['message' => 'Order deleted successfully']);
    }
}
