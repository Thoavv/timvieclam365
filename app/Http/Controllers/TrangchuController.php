<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;

class TrangchuController extends Controller
{
    public function index()
    {
        //hoặc orwhere
        $posts = Posts::latest()
        ->where('homeflag', true)
        ->where('status', true)
        ->where('display_order',1)
        ->take(6)
        ->get();
        // $posts =Posts::all();
        $posts2 = Posts::latest()
        ->where('homeflag', true)
        ->where('status', true)
        ->where('display_order',2)
        ->take(6)
        ->get();
        return view('home.index', compact('posts', 'posts2'));
    }
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        // Sử dụng query builder để tìm kiếm trong bảng posts
        $results = Posts::where('title', 'like', "%$keyword%")
                        ->orWhere('summary', 'like', "%$keyword%")
                        ->orWhere('content', 'like', "%$keyword%")
                        ->orWhere('address', 'like', "%$keyword%")
                        ->get();

        return response()->json($results);
    }
}
