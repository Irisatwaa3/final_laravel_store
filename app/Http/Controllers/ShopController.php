<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class ShopController extends Controller
{
    // عرض صفحة الفئة مع المنتجات التابعة لها
    public function showCategory($id)
    {
        $category = Category::findOrFail($id);
        $products = Product::where('category_id', $id)->get();

        return view('shop.category', compact('category', 'products'));
    }
}
