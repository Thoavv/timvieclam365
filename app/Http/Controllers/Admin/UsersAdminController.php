<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersAdminController extends Controller
{
    public function index()
    {
        $user = User::where('role_id', '>=', 1)->get();
        return view('admin.users.index', compact('user'));
    }
    public function updateStatus(Request $request, User $user)
    {
        // dd($request->all());
        $user->update(['role_id' => $request->input('role_id')]);
        return redirect()->route('users.index')->with('success', 'Trạng thái đã được cập nhật thành công.');
    }
}
