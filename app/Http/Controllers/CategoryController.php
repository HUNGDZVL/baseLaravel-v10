<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function __construct()
    {
    }

    public function index()
    {
        return view("frontend/category/index");
    }

    public function addView()
    {
        return view("frontend/category/add");
    }

    public function add(Request $request)
    {
        // Lấy tất cả dữ liệu gửi từ form
        $data = $request->all();
        print_r("Data form \n");
        // In ra dữ liệu để kiểm tra
        print_r($data);

        // chuyen huong web
        // Lưu thông báo vào session flash
        session()->flash('message', 'Thêm dữ liệu thành công!');
        $url = route('category.add');
        return redirect($url);
        // Truyền thông báo thành công bằng ->with()
        // return redirect()->route('category.add')->with('message', 'Thêm dữ liệu thành công!');
    }

    public function edit($id)
    {
        return view("frontend/category/edit");
    }

    public function update($id)
    {
        print_r("danh muc update $id");
        die;
    }

    public function delete($id)
    {
        print_r("danh muc delete $id");
        die;
    }
}