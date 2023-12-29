<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notifications;
use App\Models\Order;
use App\Models\Posts;
use Illuminate\Http\Request;

class NotificationController extends Controller
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

        // Kiểm tra và xử lý theo từng trường hợp
        if ($postId != 0) {
            // Nếu có liên quan đến bài đăng, lấy thông tin bài đăng
            $posts = Posts::where('id', $postId)
                ->get();

            // Chuyển đến view của bài đăng
            return view('admin.posts.index', compact('posts'));
        }

        if ($orderId != 0) {
            // Nếu có liên quan đến đơn hàng, lấy thông tin đơn hàng
            $order = Order::where('orders.id', $orderId)
                ->join('users', 'orders.user_id', '=', 'users.id')
                ->select('orders.*', 'users.name as user_name')
                ->orderBy('orders.id', 'asc')
                ->get();

            // Chuyển đến view của đơn hàng
            return view('admin.order.index', compact('order'));
        }
    }
}
