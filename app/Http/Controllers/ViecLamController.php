<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\PostImage;
use Illuminate\Support\Facades\Auth;

class ViecLamController extends Controller
{
    public function index()
    {
        $posts = Posts::all();
        return view('home.jobs', compact('posts'));
    }
    public function show($id)
    {
        $posts = Posts::find($id);

        // Kiểm tra xem menu có tồn tại không
        if (!$posts) {
            abort(404); // Hoặc xử lý theo cách khác nếu muốn
        }
        $pimg = PostImage::where('post_id', $id)
            ->where('status', 1)
            ->get();
        $comments = Comment::select('comments.*', 'users.name as user_name', 'users.email as user_email')
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->where('comments.post_id', $id)
            ->where('comments.status', 1)
            ->get();
        return view('home.vieclamdetail', compact('posts', 'pimg', 'comments'));
    }
    public function themhoso($id)
    {
        $post = Posts::find($id);

        // Kiểm tra xem bài viết có tồn tại không
        if (!$post) {
            abort(404); // Hoặc xử lý theo cách khác nếu muốn
        }

        return view('home.themhoso', compact('post'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'comment' => 'required',
            'post_id' => 'required|exists:posts,id',
        ]);
        if (Auth::check()) {
            $comment = new Comment;
            $comment->comment = $request->input('comment');
            $comment->post_id = $request->input('post_id');
            $comment->user_id = auth()->user()->id;
            $comment->status = 1;
            $comment->save();
            return redirect()->back();
        }
        return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để bình luận bài viết');
    }
}
