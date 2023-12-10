<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function logon(){
        return view('admin.logon');
    }
    public function postLogon(Request $request){
        // dd($request->all());
        if (Auth::attempt(['name' =>$request->name, 'password'=>$request->password, 'role_id'=>0])){
            return redirect()->route('admin.index');
        }
        // Nếu đăng nhập thất bại, chuyển hướng với thông báo lỗi
        return redirect()->route('logon')->with('error', 'Đăng nhập thất bại. Vui lòng kiểm tra lại thông tin đăng nhập.');
    }
    public function singout()
    {
        Auth::logout();
        return redirect()->route('logon');
    }
}
