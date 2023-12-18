<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function login()
    {
        return view('home.login');
    }
    public function postLogin(Request $request)
    {
        // dd($request->all());
        // Kiểm tra đăng nhập
        $credentials = $request->only('name', 'password');

        if (Auth::attempt($credentials)) {
            // Kiểm tra mật khẩu với hàm Hash::check
            if (Hash::check($request->password, Auth::user()->password)) {
                // Nếu đăng nhập thành công, chuyển hướng đến trang chính
                return redirect()->route('index')->with('success', 'Đăng nhập thành công.');
            }
        }
        // Nếu đăng nhập thất bại, chuyển hướng với thông báo lỗi
        return redirect()->route('login')->with('error', 'Đăng nhập thất bại. Vui lòng kiểm tra lại thông tin đăng nhập.');
    }
    public function register()
    {
        return view('home.register');
    }

    public function postRegister(Request $request)
    {
        // Kiểm tra dữ liệu đầu vào
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Nếu kiểm tra hợp lệ thất bại, chuyển hướng với thông báo lỗi và dữ liệu nhập trước đó
        if ($validator->fails()) {
            return redirect()->route('register')
                ->withErrors($validator)
                ->withInput();
        }

        // Mã hóa mật khẩu
        $password = Hash::make($request->password);

        // Thử tạo người dùng mới
        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $password,
                'role_id' => 1,
            ]);
        } catch (\Throwable $exception) {
            // Xử lý ngoại lệ (ví dụ: ghi log hoặc chuyển hướng với thông báo lỗi)
            return redirect()->route('register')->with('error', 'Đăng ký thất bại. Vui lòng thử lại.');
        }

        // Chuyển hướng đến trang đăng nhập với thông báo thành công
        return redirect()->route('login')->with('success', 'Đăng ký thành công. Bạn có thể đăng nhập ngay bây giờ.');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('index')->with('success', 'Đăng xuất thành công.');
    }
    public function changePasswordForm()
    {
        return view('account.taikhoan.changepassword');
    }
    public function changePassword(Request $request)
    {
        // dd($request -> all());
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = Auth::user();

        // Kiểm tra mật khẩu hiện tại của người dùng
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->route('change.password.form')->with('error', 'Mật khẩu hiện tại không chính xác.');
        }

        // Cập nhật mật khẩu mới
        $data = (['password' => Hash::make($request->password),]);
        /** @var \App\Models\User $user **/
        $user->update($data);

        return redirect()->route('change.password.form')->with('success', 'Đổi mật khẩu thành công.');
    }
}
