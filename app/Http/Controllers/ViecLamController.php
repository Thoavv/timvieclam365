<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
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
        return view('home.vieclamdetail', compact('posts'));
    }
}
