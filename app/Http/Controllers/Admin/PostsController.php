<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Posts;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Posts::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        Posts::create($request->all());
        return redirect()->route('posts.index')->with('success', 'Thêm mới thành công!');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Posts::find($id);

        // Kiểm tra xem menu có tồn tại không
        if (!$posts) {
            abort(404); // Hoặc xử lý theo cách khác nếu muốn
        }

        return view('admin.posts.detail', compact('posts'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //lấy thông tin post cần sửa
        $posts = Posts::findOrFail($id);
        //Trả về view và truyền chuỗi
        return view('admin.posts.edit', compact('posts'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
            'status' => 'nullable|boolean',
            'vacancy_count' => 'nullable|integer',
            'address' => 'nullable|string|max:255',
        ]);

        // Cập nhật bản ghi trong cơ sở dữ liệu
        $post->update($data);

        return redirect()->route('posts.index')->with('success', 'Bài viết đã được cập nhật thành công.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Lấy bài viết cần xóa với id
        $ps = Posts::find($id);
        //kiểm tra xem bài viết có có tồn tại không
        if (!$ps) {
            return redirect()->route('posts.index')->with('error', 'Bài viết không tồn tại.');
        }

        // Xóa menu
        $ps->delete();

        // Chuyển hướng sau khi xóa
        return redirect()->route('posts.index')->with('success', 'Bài viết đã được xoá thành công.');
    }
}
