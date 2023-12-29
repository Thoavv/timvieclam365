<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notifications;
use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\PostImage;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Posts::all();
        return view('admin.posts.index', compact('posts'));
    }
    public function create()
    {
        return view('admin.posts.create');
    }

    // {
    //     dd($request->all());
    //     // Posts::create($request->all());
    //     // return redirect()->route('posts.index')->with('success', 'Thêm mới thành công!');
    // }
    public function store(Request $request)
    {
        // Validate và xử lý dữ liệu từ form
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'nullable|string',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Example validation for image uploads
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
            'end_date'=> 'nullable|date',
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
        $post = Posts::create($data);

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
        return redirect()->route('posts.index')->with('success', 'Thêm mới thành công!');
    }
    public function show($id)
    {
        $posts = Posts::find($id);

        // Kiểm tra xem menu có tồn tại không
        if (!$posts) {
            abort(404); // Hoặc xử lý theo cách khác nếu muốn
        }

        return view('admin.posts.detail', compact('posts'));
    }
    public function edit($id)
    {
        //lấy thông tin post cần sửa
        $posts = Posts::findOrFail($id);
        //Trả về view và truyền chuỗi
        return view('admin.posts.edit', compact('posts'));
    }
    public function update(Request $request, $id)
    {
        // Kiểm tra xem bản ghi có tồn tại hay không
        $post = Posts::find($id);

        if (!$post) {
            return redirect()->route('posts.index')->with('error', 'Bài viết không tồn tại.');
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
            'end_date'=> 'nullable|date',
        ]);

        // Cập nhật bản ghi trong cơ sở dữ liệu
        $post->update($data);

        return redirect()->route('posts.index')->with('success', 'Bài viết đã được cập nhật thành công.');
    }
    public function destroy($id)
    {
        $ps = Posts::find($id);
        if (!$ps) {
            return redirect()->route('posts.index')->with('error', 'Bài viết không tồn tại.');
        }
        $images = PostImage::where('post_id', $ps->id)->get();
        if ($images->isNotEmpty()) {
        foreach ($images as $image) {
            Storage::delete('public/' . $image->filename);
            $image->delete();
            }
        }
        $ps->delete();

        // Chuyển hướng sau khi xóa
        return redirect()->route('posts.index')->with('success', 'Bài viết đã được xoá thành công.');
    }
    public function updateStatus(Request $request, Posts $post)
    {
        // dd($request->all());
        $post->update(['status' => $request->input('status')]);
        if ($request->input('status') == 1) {
            $authorId = $post->authorid;
            $pt = $post ->id;
                $ntcn = Notifications::create([
                    'title' => 'Thông báo có bài viết đã được phê duyệt',
                    'user_id' => 1,
                    'receiver_id' => $authorId,
                    'post_id' => $pt,
                    'order_id' => 0,
                    'message' => 'OK',
                    'status' => 1,
                    'candidates_id'=>0,
                    'differentiate'=>0,
                ]);
        }
        if ($request->input('status') == 0) {
            $authorId = $post->authorid;
            $pt = $post ->id;
                $ntcn = Notifications::create([
                    'title' => 'Thông báo có bài viết không được phê duyệt',
                    'user_id' => 1,
                    'receiver_id' => $authorId,
                    'post_id' => $pt,
                    'order_id' => 0,
                    'message' => 'Đang chờ',
                    'status' => 1,
                    'candidates_id'=>0,
                    'differentiate'=>0,
                ]);
        }

        // Chuyển hướng hoặc trả về phản hồi tùy thuộc vào logic của bạn
        return redirect()->route('posts.index')->with('success', 'Trạng thái đã được cập nhật thành công.');
    }

}
