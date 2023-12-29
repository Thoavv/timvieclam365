<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notifications;
use App\Models\Posts;
use App\Models\Order;
use App\Models\User;
use App\Models\Candidate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ThongbaoController extends Controller
{

    public function show($id)
    {
        // Tìm thông báo theo ID
        $notification = Notifications::find($id);

        // Kiểm tra xem có thông báo hay không
        if (!$notification) {
            abort(404);
        }
        // Cập nhật trạng thái thông báo
        $notification->update([
            'status' => 0,
        ]);

        // Lấy ID của bài đăng và đơn hàng từ thông báo
        $postId = $notification->post_id;
        $orderId = $notification->order_id;
        $candidates_id = $notification->candidates_id;
        $differentiate = $notification->differentiate;

        // Kiểm tra và xử lý theo từng trường hợp
        if ($postId != 0 && $differentiate == 0) {
            // Nếu có liên quan đến bài đăng, lấy thông tin bài đăng
            $post = Posts::where('id', $postId)
                ->get();

            // Chuyển đến view của bài đăng
            return view('account.dangtuyen.index', compact('post'));
        }

        if ($differentiate == 1 ) {
            // Nếu có liên quan đến đơn hàng, lấy thông tin đơn hàng
            $id = Auth::user()->id;

            $orders = Order::select('orders.*', 'package_storage.package_name', 'package_storage.price', 'package_storage.duration', 'package_storage.description')
                ->join('package_storage', 'orders.package_id', '=', 'package_storage.id')
                ->where('orders.user_id', $id)
                ->where('orders.status', '<>', 0)
                ->where('orders.id',  $orderId)
                ->get();
            // Chuyển đến view của đơn hàng
            return view('account.mygoidang.index', compact('orders'));
        }
        if ($differentiate == 2) {
            // Nếu có liên quan đến đơn hàng, lấy thông tin đơn hàng
            $id = Auth::user()->id;
            $candidates = DB::table('candidates')
            ->join('posts', 'candidates.post_id', '=', 'posts.id')
            ->select('candidates.*', 'posts.id as post_id', 'posts.title', )
            ->where('candidates.id',$candidates_id)
            ->where('posts.authorid', $id)
            ->get();
            // Chuyển đến view của đơn hàng
            return view('account.ungvien.index', compact('candidates'));
        }
        if ($differentiate == 3) {
            $notification = Notifications::where('id', $id)->first();

            // Kiểm tra xem có thông báo nào không
            if ($notification) {
                // Chuyển đến view của đơn hàng
                return view('account.thongbao.index', compact('notification'));
            } else {
                // Handle the case when no notification is found
                return redirect()->route('some.redirect.route')->with('error', 'Không tìm thấy thông báo.');
            }
        }
    }
}
