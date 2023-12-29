<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MygoidangController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;

        $orders = Order::select('orders.*', 'package_storage.package_name', 'package_storage.price','package_storage.duration','package_storage.description')
            ->join('package_storage', 'orders.package_id', '=', 'package_storage.id')
            ->where('orders.user_id', $id)
            ->where('orders.status', '<>', 0)
            ->get();

        return view('account.mygoidang.index', compact('orders'));
    }
}
