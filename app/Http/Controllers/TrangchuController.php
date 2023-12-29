<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use Carbon\Carbon;

class TrangchuController extends Controller
{
    public function index()
    {
        $currentDate = Carbon::now()->toDateString();
        //hoặc orwhere
        $posts = Posts::latest()
        ->where('homeflag', 1)
        ->where('status', 1)
        ->whereDate('end_date', '>=', $currentDate)
        ->take(6)
        ->get();
        // $posts =Posts::all();
        $posts2 = Posts::latest()
        ->where('homeflag', 2)
        ->where('status', 1)
        ->whereDate('end_date', '>=', $currentDate)
        ->take(6)
        ->get();
        return view('home.index', compact('posts', 'posts2'));
    }
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $results = Posts::where('title', 'like', "%$keyword%")
                        ->orWhere('summary', 'like', "%$keyword%")
                        ->orWhere('content', 'like', "%$keyword%")
                        ->orWhere('address', 'like', "%$keyword%")
                        ->get();

        return response()->json($results);
    }
}
