<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PackageStorage;

class TuyendungController extends Controller
{
    public function index()
    {
        $ps = PackageStorage::where('status', true)->get();
        return view('home.tuyendung', compact('ps'));
    }
}
