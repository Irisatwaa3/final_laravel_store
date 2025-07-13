<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;  // لو حابب تستخدمها

class ShopController extends Controller
{
    // عرض كل المنتجات
    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }

    // عرض المنتجات حسب الفئة
    public function showCategory($id)
    {
        // تحقق من وجود الفئة
        $category = Category::find($id);
        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        // جلب المنتجات المرتبطة بالفئة
        $products = Product::where('category_id', $id)->get();

        return response()->json([
            'category' => $category,
            'products' => $products,
        ]);
    }

    // إضافة منتج جديد
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ]);

        $product = Product::create($request->all());

        return response()->json($product, 201);
    }

    // عرض منتج محدد
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product);
    }

    // تحديث منتج
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());

        return response()->json($product);
    }

    // حذف منتج
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json(null, 204);
    }
}
