<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\PackageStorage;
use App\Models\PostImage;
use App\Models\Posts;
use App\Models\Notifications;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DangtuyenController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $post = Posts::where('authorid', $id)
            ->get();
        return view('account.dangtuyen.index', compact('post'));
    }
    public function create()
    {
        $id = Auth::user()->id;
        $order = Order::where('user_id', $id)
            ->where('status', 1)
            ->first();
        if ($order) {
            $goid = Order::where('user_id', $id)
                ->where('orders.status', 1)
                ->join('package_storage', 'orders.package_id', '=', 'package_storage.id')
                ->select('orders.*', 'package_storage.package_name', 'package_storage.duration')
                ->get();
            return view('account.dangtuyen.create', compact('goid'));
        } else {
            return redirect()->route('goidang')->with('error', 'Bạn cần phải mua gói đăng trước nhé!');
        }
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'order_id' => 'nullable|integer',
            'title' => 'required|string|max:255',
            'summary' => 'nullable|string',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'job_typeid' => 'nullable|integer',
            'detail_link' => 'nullable|string|max:255',
            'display_order' => 'nullable|integer',
            'post_typeid' => 'nullable|integer',
            'authorid' => 'nullable|integer',
            'posting_date' => 'nullable|date',
            'closing_date' => 'nullable|date',
            'status' => 'nullable|integer',
            'vacancy_count' => 'nullable|integer',
            'address' => 'nullable|string|max:255',
            'homeflag' => 'nullable|integer',
            'phone_number' => 'nullable|string|max:20',
        ]);
        //xử lý loại gói đăng bằng order_id = id
        $order = Order::find($request->input('order_id'));
        // Lấy giá trị duration thông qua package_id
        $package = PackageStorage::where('id', $order->package_id)->first();
        $duration = $package->duration;
        $hlg = $package->homeflag;
        // Lấy ngày hiện tại
        $currentDate = Carbon::now();
        // Tính toán end_date bằng cách thêm duration vào ngày hiện tại
        $endDate = $currentDate->addDays($duration);
        // Cập nhật trạng thái và end_date
        $order->update([
            'status' => 0,
            'end_date' => $endDate,
        ]);
        // Xử lý tải lên hình ảnh của bài viết
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            // Lưu hình ảnh vào thư mục "public/images"
            $image->storeAs('public/images', $imageName);
            // Lưu đường dẫn hình ảnh vào cơ sở dữ liệu
            $data['image'] = 'images/' . $imageName;
        }

        // Tạo bài viết mới với dữ liệu đã kiểm tra
        $post = Posts::create([
            'title' => $data['title'],
            'summary' => $data['summary'],
            'content' => $data['content'],
            'image' => $data['image'],
            'job_typeid' => $data['job_typeid'],
            'detail_link' => $data['detail_link'],
            'display_order' => $data['display_order'],
            'post_typeid' => $data['post_typeid'],
            'authorid' => $data['authorid'],
            'posting_date' => $data['posting_date'],
            'closing_date' => $data['closing_date'],
            'status' => $data['status'],
            'vacancy_count' => $data['vacancy_count'],
            'address' => $data['address'],
            'homeflag' => $hlg,
            'phone_number' => $data['phone_number'],
            'end_date' => $endDate, // Thêm end_date vào bài viết
        ]);
        $ntcn = Notifications::create([
            'title'=> 'Thông báo có bài viết chờ xử lý',
            'user_id' => $data['authorid'],
            'receiver_id'=> 1,
            'post_id'=> $post->id,
            'order_id'=>0,
            'message'=>'Đang chờ',
            'status'=>1,
            'candidates_id'=>0,
            'differentiate'=>0,
        ]);


        // Xử lý tải lên nhiều hình ảnh và lưu chúng vào bảng post_images
        if ($request->hasFile('images')) {
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/images', $imageName);

                // Lưu đường dẫn vào bảng post_images và liên kết với bài viết
                PostImage::create([
                    'image_name' => 'images/' . $imageName,
                    'image_path' => 'storage/images/' . $imageName,
                    'status' => 1,
                    'post_id' => $post->id,
                ]);
            }
        }
        return redirect()->route('dangtuyen.index')->with('success', 'Thêm mới thành công!');
    }
    public function show($id)
    {
        $posts = Posts::find($id);
        // Kiểm tra xem menu có tồn tại không
        if (!$posts) {
            abort(404); // Hoặc xử lý theo cách khác nếu muốn
        }
        return view('account.dangtuyen.detail', compact('posts'));
    }
    public function edit($id)
    {
        //lấy thông tin post cần sửa
        $posts = Posts::findOrFail($id);
        //Trả về view và truyền chuỗi
        return view('account.dangtuyen.edit', compact('posts'));
    }
    public function update(Request $request, $id)
    {
        // Kiểm tra xem bản ghi có tồn tại hay không
        $post = Posts::find($id);
        if (!$post) {
            return redirect()->route('dangtuyen.index')->with('error', 'Bài viết không tồn tại.');
        }
        // Xử lý dữ liệu từ form
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'nullable|string',
            'content' => 'nullable|string',
            'image' => 'nullable|string|max:255',
            'job_typeid' => 'nullable|integer',
            'detail_link' => 'nullable|string|max:255',
            'display_order' => 'nullable|integer',
            'post_typeid' => 'nullable|integer',
            'authorid' => 'nullable|integer',
            'posting_date' => 'nullable|date',
            'closing_date' => 'nullable|date',
            'status' => 'nullable|integer',
            'vacancy_count' => 'nullable|integer',
            'address' => 'nullable|string|max:255',
            'homeflag' => 'nullable|integer',
            'phone_number' => 'nullable|string|max:20',
        ]);

        // Cập nhật bản ghi trong cơ sở dữ liệu
        $post->update($data);

        return redirect()->route('dangtuyen.index')->with('success', 'Bài viết đã được cập nhật thành công.');
    }
    public function destroy($id)
    {
        // Lấy bài viết cần xóa với id
        $ps = Posts::find($id);
        //kiểm tra xem bài viết có có tồn tại không
        if (!$ps) {
            return redirect()->route('dangtuyen.index')->with('error', 'Bài viết không tồn tại.');
        }
        // Lấy danh sách hình ảnh liên quan
        $images = PostImage::where('post_id', $ps->id)->get();
        // Kiểm tra xem có hình ảnh để xử lý hay không
        if ($images->isNotEmpty()) {
            // Xoá từng hình ảnh
            foreach ($images as $image) {
                // Xoá hình ảnh từ đĩa lưu trữ
                Storage::delete('public/' . $image->filename);
                // Xoá hình ảnh từ cơ sở dữ liệu
                $image->delete();
            }
        }
        // Xóa menu
        $ps->delete();

        // Chuyển hướng sau khi xóa
        return redirect()->route('dangtuyen.index')->with('success', 'Bài viết đã được xoá thành công.');
    }
}
