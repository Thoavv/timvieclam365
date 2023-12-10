<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $menus = Menu::all();
        // $menus = Menu::where('your_column', '=', 'your_value');
        $menus = Menu::orderBy('id', 'asc')->get();//tăng dần
        // $menus = Menu::orderBy('id', 'desc')->get();//giảm dần
        return view('admin.menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.menu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all()); //hiện thị mạng ra view
        try {
            Menu::create($request->all());
            return redirect()->route('menu.index')->with('success', 'Thêm mới thành công!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('success', 'Thêm mới không thành công');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $menu = Menu::find($id);

        // Kiểm tra xem menu có tồn tại không
        if (!$menu) {
            abort(404); // Hoặc xử lý theo cách khác nếu muốn
        }

        return view('admin.menu.detail', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //lấy thông tin menu cần sửa
        $menu = Menu::findOrFail($id);
        //Trả về view và truyền chuỗi
        return view('admin.menu.edit', compact('menu'));
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
        $request->validate([
            'MenuName' => 'required|string|max:50',
            'ControllerName' => 'nullable|string|max:50',
            'Levels' => 'required|integer',
            'ParentID' => 'nullable|integer',
            'MenuOrder' => 'nullable|integer',
            'Position' => 'required|integer',
            'Link' => 'nullable|string|max:250',
            'IsActive' => 'required|boolean',
        ]);

        // Lấy thông tin menu cần sửa
        $menu = Menu::findOrFail($id);

        // Cập nhật dữ liệu
        $menu->update($request->all());

        // Chuyển hướng sau khi cập nhật
        return redirect()->route('menu.index')->with('success', 'Menu đã được cập nhật thành công.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Lấy menu cần xóa
        $menu = Menu::find($id);
        //kiểm tra xem menu có tồn tại không
        if (!$menu) {
            return redirect()->route('menu.index')->with('error', 'Menu không tồn tại.');
        }

        // Xóa menu
        $menu->delete();

        // Chuyển hướng sau khi xóa
        return redirect()->route('menu.index')->with('success', 'Menu đã được xoá thành công.');
    }
}
