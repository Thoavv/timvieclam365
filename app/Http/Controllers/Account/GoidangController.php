<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\PackageStorage;

class GoidangController extends Controller
{
    public function index()
    {
        $ps = PackageStorage::where('status', true)->get();
        return view('account.goidang', compact('ps'));
    }
    public function pay($id)
    {
        $pk = PackageStorage::find($id);

        // Kiểm tra xem menu có tồn tại không
        if (!$pk) {
            abort(404); // Hoặc xử lý theo cách khác nếu muốn
        }
        return view('account.thanhtoan', compact('pk'));
    }
    // UserController.php hoặc một Controller khác tùy theo thiết kế của bạn
    public function payok($packageId)
    {
        $user = auth()->user();
        $package = PackageStorage::find($packageId);

        // Kiểm tra nếu người dùng và gói đăng tồn tại
        if ($user && $package) {
            // Thêm mới bản ghi vào bảng orders
            $order = new Order();
            $order->user_id = $user->id;
            $order->package_id = $package->id;
            $order->post_id =0;
            $order->status = 2;
            $order->end_date = now()->addMonth();
            $order->save();
            return redirect()->route('goidang')->with('success', 'Thanh toán thành công!');
        }
        return redirect()->route('goidang')->with('error', 'Có lỗi xảy ra trong quá trình thanh toán.');
    }
    // public function updateStatus(Request $request, Order $order)
    // {
    //     // dd($request->all());
    //     $order->update(['status' => $request->input('status')]);
    //     // Chuyển hướng hoặc trả về phản hồi tùy thuộc vào logic của bạn
    //     return redirect()->route('posts.index')->with('success', 'Trạng thái đã được cập nhật thành công.');
    // }

}
