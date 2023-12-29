<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Candidate;
use App\Models\Notifications;

class NaphosoController extends Controller
{
    public function naphoso(Request $request)
    {
        // dd($request->all());
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (Auth::check()) {
            // Lấy ID của người dùng đăng nhập
            $userId = Auth::id();

            // Xác thực dữ liệu từ biểu mẫu
            $request->validate([
                'full_name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone_number' => 'required|string|max:15',
                'link_cv' => 'required|string|max:255',
                'post_id' => 'required|integer',
                'status' => 'required|integer',
                'user_id' => 'required|integer',
            ]);

            // Tạo ứng viên mới
            $candidate = Candidate::create([
                'user_id' => $userId,
                'full_name' => $request->input('full_name'),
                'email' => $request->input('email'),
                'phone_number' => $request->input('phone_number'),
                'link_cv' => $request->input('link_cv'),
                'post_id' => $request->input('post_id'),
                'status' => $request->input('status'),
                'receiver_id'=> $request->input('receiver_id'),
            ]);

            // Tạo thông báo (notification)
            $ntcn = Notifications::create([
                'title' => 'Thông báo có ừng viên mới',
                'user_id' => $userId,
                'receiver_id' => $request->input('receiver_id'),
                'post_id' => $request->input('post_id'),
                'order_id' => 0,
                'message' => 'Đang chờ',
                'status' => 1,
                'candidates_id' => $candidate->id,
                'differentiate'=>2,
            ]);

            return redirect()->route('vieclam.show', ['id' => $request->input('post_id')])->with('success', 'Hồ sơ đã được nạp thành công.');
        } else {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để nạp hồ sơ.');
        }
    }
}
