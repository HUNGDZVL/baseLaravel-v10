<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\App;

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

    public function addView(Request $request)
    {

        return view("frontend/category/add");
    }
    public function addViewv2()
    {
        return view("frontend/category/addv2");
    }

    public function add(Request $request, Validator $validator)
    {
        // Chuyển đổi locale tạm thời sang tiếng Việt
        App::setLocale('vi');
        // Lấy tất cả dữ liệu gửi từ form
        $data = $request->all();
        // print_r("Data form \n");
        // In ra dữ liệu để kiểm tra
        $name = $request->name;
        // chuyen huong web
        // Lưu thông báo vào session flash
        session()->flash('message', 'Thêm dữ liệu thành công!'); // taoj messsage thong bao
        $request->flash(); // khoi tao flash để set sisson cho old
        $request->old($name); // luu gia tri vua nhap va trả về client theo url
        $url = route('category.add');
        return redirect($url);
        // Truyền thông báo thành công bằng ->with()
        // return redirect()->route('category.add')->with('message', 'Thêm dữ liệu thành công!');

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'birthdate' => 'nullable|date',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate file upload
            // Thêm các trường và thuộc tính validation khác tùy vào yêu cầu của bạn
        ]);

        // Thiết lập ngôn ngữ là tiếng Việt cho thông báo lỗi validation
        $validator->sometimes('*', 'required', function ($input) {
            return true; // Áp dụng cho tất cả các trường
        });

        // Kiểm tra nếu validator không hợp lệ
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
    }

    // http resquest
    public function addv2(Request $request)
    {
        $data = $request->all();
        if ($request->hasFile('file')) {
            // check file trong laravel
            if ($request->file->isValid()) {
                // lay file
                $file = $request->file;
                // lay path
                // $path = $file->path();
                //extension (duoi file)
                $extension = $file->extension();
                // dd($path);
                // dd($extension);
                // lưu file vô store
                // $path = $file->store("uploads");
                // đổi tên
                $path = $file->storeAs("uploads", "file" . time() . '.' . $extension);
                dd($path);
                // dd($file);        // $name = $request->input('name');
                // Lưu trong public:
                // Đường dẫn tới thư mục đích
                // $destinationPath = public_path('photos');

                // Kiểm tra và tạo thư mục nếu chưa tồn tại
                // if (!File::exists($destinationPath)) {
                //     File::makeDirectory($destinationPath, 0755, true);
                // }
                // Di chuyển tệp vào thư mục đích
                // $path = $file->move($destinationPath, $filename);
                // có rồi thì lưu thẳng
                // $path = $request->file('photo')->move(public_path('photos'), $filename);

            } else {
                echo "Upload khong thanh cong";
            }
        } else {
            echo "<h1>Hãy chọn file</h1>";
        }
        // dd($name);
        // Lấy dữ liệu từ form data cách 2, sử dụng thẳng resquest mà không thông qua đối tượng Http res
        // $name = request('name');
        // $name = request('email', 'default'); // không có dữ liệu thì trả default
        // $email = request('age');
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
