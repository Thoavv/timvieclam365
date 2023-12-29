<?php

namespace App\Http\Controllers\Admin;

use App\Models\Notifications;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class OrderController extends Controller
{

    public function index()
    {

        // $menus = Menu::all();
        // $menus = Menu::where('your_column', '=', 'your_value');
        // $menus = Menu::orderBy('id', 'desc')->get();//giảm dần
        // $order = Order::orderBy('id', 'asc')->get();//tăng dần
        $order = DB::table('orders')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->select('orders.*', 'users.name as user_name')
            ->orderBy('orders.id', 'asc')
            ->get();
        return view('admin.order.index', compact('order'));
    }
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
    public function updateStatus(Request $request, Order $order)
    {
        // dd($request->all());
        $order->update(['status' => $request->input('status')]);
        $OR = $order->id;
        $user_id = $order ->user_id;
        if ($request->input('status') == 1) {
                $ntcn = Notifications::create([
                    'title' => 'Thông báo bạn đã mua gói đăng thành công',
                    'user_id' => 1,
                    'receiver_id' => $user_id,
                    'post_id' => 0,
                    'order_id' =>$OR,
                    'message' => 'OK',
                    'status' => 1,
                    'candidates_id'=>0,
                    'differentiate'=>1,
                ]);
        }
        if ($request->input('status') == 2) {
                $ntcn = Notifications::create([
                    'title' => 'Thông báo gÓI đăng chưa thanh toán thành công',
                    'user_id' => 1,
                    'receiver_id' => $user_id,
                    'post_id' => 0,
                    'order_id' => $OR,
                    'message' => 'Đang chờ',
                    'status' => 1,
                    'differentiate'=>1,
                ]);
        }
        // Chuyển hướng hoặc trả về phản hồi tùy thuộc vào logic của bạn
        return redirect()->route('order.index')->with('success', 'Trạng thái đã được cập nhật thành công.');
    }
}
