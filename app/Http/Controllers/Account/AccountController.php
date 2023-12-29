<?php
namespace App\Http\Controllers\Account;
use App\Http\Controllers\Controller;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('account.index');
    }
    public function profile()
    {
        $id= Auth::user()->id;
        $user = User::find($id);
        return view('account.profile', compact('user'));
    }
}
