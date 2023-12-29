<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Notifications;
use App\Models\Candidate;


class UngvienController extends Controller
{

    public function index()
    {
        $id = Auth::user()->id;
        $candidates = DB::table('candidates')
        ->join('posts', 'candidates.post_id', '=', 'posts.id')
        ->select('candidates.*', 'posts.id as post_id', 'posts.title', )
        ->where('posts.authorid', $id)
        ->get();

        return view('account.ungvien.index', compact('candidates'));
    }
    public function updateStatus(Request $request, Candidate $candidates)
    {
        // dd($request->all());
        $id = Auth::user()->id;
        $candidates->update(['status' => $request->input('status')]);
        if ($request->input('status') == 1) {
            $pt = $candidates->post_id;
            $candidatesid=$candidates->id;
            $userid = $candidates ->user_id;
                $ntcn = Notifications::create([
                    'title' => 'Bạn đã được tuyển',
                    'user_id' => $id,
                    'receiver_id' => $userid,
                    'post_id' => $pt,
                    'order_id' => 0,
                    'message' => 'Liên hệ ngay để biết thêm thông tin chi tiết',
                    'status' => 1,
                    'candidates_id'=>$candidatesid,
                    'differentiate'=>3,
                ]);
        }
        if ($request->input('status') == 0) {
            $pt = $candidates->post_id;
            $candidatesid=$candidates->id;
            $userid = $candidates ->user_id;
                $ntcn = Notifications::create([
                    'title' => 'Bạn trượt rồi nhế !',
                    'user_id' => $id,
                    'receiver_id' => $userid,
                    'post_id' => $pt,
                    'order_id' => 0,
                    'message' => 'OK',
                    'status' => 1,
                    'candidates_id'=>$candidatesid,
                    'differentiate'=>3,
                ]);
        }
        // Chuyển hướng hoặc trả về phản hồi tùy thuộc vào logic của bạn
        return redirect()->route('ungvien.index')->with('success', 'Trạng thái đã được cập nhật thành công.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
