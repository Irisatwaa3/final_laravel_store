<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = Customer::all();
        return view('admin.users.index', compact('users'));
    }

    public function updateRole(Request $request, Customer $user)
    {
        $request->validate([
            'role' => 'required|in:admin,user',
        ]);

        $user->role = $request->role;
        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'تم تحديث صلاحية المستخدم بنجاح.');
    }
}
