<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    // عرض المستخدمين مع إمكانية الفلترة حسب الدور
    public function index(Request $request)
    {
        $query = Customer::query();

        if ($request->has('role')) {
            $query->where('role', $request->role);
        }

        $customers = $query->get();

        return response()->json(['customers' => $customers]);
    }

    // تحديث صلاحية مستخدم
    public function updateRole(Request $request, $id)
    {
        $request->validate([
            'role' => 'required|string|in:admin,user,customer', // غيّر القيم حسب أدوارك المتاحة
        ]);

        $customer = Customer::find($id);

        if (!$customer) {
            return response()->json(['message' => 'Customer not found'], 404);
        }

        $customer->role = $request->role;
        $customer->save();

        return response()->json([
            'message' => 'Role updated successfully',
            'customer' => $customer
        ]);
    }
}
