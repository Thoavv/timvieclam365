<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PackageStorage;
use Illuminate\Http\Request;

class PackagestorageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = PackageStorage::all();
        return view('admin.packagestorage.index', compact('packages'));
    }
    public function create()
    {
        return view('admin.packagestorage.create');
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'package_name' => 'nullable|string',
            'description' => 'nullable|string',
            'price' => 'nullable|integer',
            'duration' => 'nullable|integer',
            'status' => 'nullable|integer',
            'homeflag' => 'nullable|integer',
        ]);
        $packageStorage = PackageStorage::create($data);
        return redirect()->route('packagestorage.index')->with('success', 'Thêm mới thành công!');

    }
    public function show($id)
    {
        $pk = PackageStorage::find($id);
        return view('account.dangtuyen.detail', compact('pk'));

    }
    public function edit($id)
    {
        $pk = PackageStorage::findOrFail($id);
        return view('admin.packagestorage.edit', compact('pk'));

    }
    public function update(Request $request, $id)
    {
        $pk = PackageStorage::find($id);
        if(!$pk){
            return redirect()->route('packagestorage.index')->with('error', 'Gói đăng không tồn tại!');
        }
        $data = $request->validate([
            'package_name' => 'nullable|string',
            'description' => 'nullable|string',
            'price' => 'nullable|integer',
            'duration' => 'nullable|integer',
            'status' => 'nullable|integer',
            'homeflag' => 'nullable|integer',
        ]);
        $pk ->update($data);
        return redirect()->route('packagestorage.index')->with('success', 'Sửa thành công!');

    }
    public function destroy($id)
    {
        $pk = PackageStorage::find($id);
        if(!$pk){
            return redirect()->route('packagestorage.index')->with('error', 'Gói đăng không tồn tại!');
        }
        $pk->delete();
        return redirect()->route('packagestorage.index')->with('success', 'Gói đăng đã được xoá!');
    }
}
