<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PackageStorage;

class GoidangController extends Controller
{
    public function index()
    {
        $ps = PackageStorage::where('status', true)->get();
        return view('home.goidang', compact('ps'));
    }
}
