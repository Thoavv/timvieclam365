<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;

class TrangchuController extends Controller
{
    public function index()
    {
        // Lấy 12 bài viết mới nhất
        // $posts = Posts::latest()->where('homeflag', true)->take(8)->get();
        $posts =Posts::all();
        return view('home.index', compact('posts'));
    }
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        // Sử dụng query builder để tìm kiếm trong bảng posts
        $results = Posts::where('title', 'like', "%$keyword%")
                        ->orWhere('summary', 'like', "%$keyword%")
                        ->orWhere('content', 'like', "%$keyword%")
                        ->get();

        return response()->json($results);
    }
}
