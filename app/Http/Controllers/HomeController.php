<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
//Service
use App\Services\BaseService;
use App\Models\User;
use App\Services\AccountService;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // khởi tạo contruc injection
    private $baseService;
    private $modelUser;
    private $AccountService;
    public function __construct(BaseService $baseService, User $modelUser, AccountService $AccountService)
    {
        // sử dụng service 
        $this->baseService = $baseService;
        // sử dụng model
        $this->modelUser = $modelUser;
        // $this->middleware('auth');
        $this->AccountService = $AccountService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($any = null)
    {

        // Kiểm tra xem view có tồn tại hay không
        if ($any && view()->exists($any)) {
            return view($any);
        }
        // Trả về lỗi 404 nếu không tìm thấy view hoặc không có request
        return abort(404);
    }
    // load trang home
    public function indexHome()
    {

        return view("dashboard-crm");
    }
    // sử dụng service
    public function service()
    {
        // sử dụng service design patten DI
        // return $this->baseService->responsebc("success", "OKi service design", 200, true);
        // die;
        // sử dụng base Method trong Class Controller
        // lấy dữ liệu từ models, sử dụng method base
        // $data = $this->modelUser::find(1); // query base
        // query ORM
        // $data = $this->modelUser->select_array('tbl_account', ['*']);
        // query Service
        $data = $this->AccountService->getAllUsers();
        return $this->responsebc("success", "Data OK", 200, $data);
        die;
    }




    // logic template Admin

    public function root()
    {
        return view('index');
    }

    /*Language Translation*/
    public function lang($locale)
    {
        if ($locale) {
            App::setLocale($locale);
            Session::put('lang', $locale);
            Session::save();
            return redirect()->back()->with('locale', $locale);
        } else {
            return redirect()->back();
        }
    }

    public function updateProfile(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email'],
            'avatar' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:1024'],
        ]);

        $user = User::find($id);
        $user->name = $request->get('name') ?: "Hưng";
        $user->email = $request->get('email') ?: "hung@gmail.com";

        if ($request->file('avatar')) {
            $avatar = $request->file('avatar');
            $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
            $avatarPath = public_path('/images/');
            $avatar->move($avatarPath, $avatarName);
            $user->avatar =  $avatarName;
        }

        $user->update();
        if ($user) {
            Session::flash('message', 'User Details Updated successfully!');
            Session::flash('alert-class', 'alert-success');
            // return response()->json([
            //     'isSuccess' => true,
            //     'Message' => "User Details Updated successfully!"
            // ], 200); // Status code here
            return redirect()->back();
        } else {
            Session::flash('message', 'Something went wrong!');
            Session::flash('alert-class', 'alert-danger');
            // return response()->json([
            //     'isSuccess' => true,
            //     'Message' => "Something went wrong!"
            // ], 200); // Status code here
            return redirect()->back();
        }
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'current_password' => ['required', 'string'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {
            return response()->json([
                'isSuccess' => false,
                'Message' => "Your Current password does not matches with the password you provided. Please try again."
            ], 200); // Status code
        } else {
            $user = User::find($id);
            $user->password = Hash::make($request->get('password'));
            $user->update();
            if ($user) {
                Session::flash('message', 'Password updated successfully!');
                Session::flash('alert-class', 'alert-success');
                return response()->json([
                    'isSuccess' => true,
                    'Message' => "Password updated successfully!"
                ], 200); // Status code here
            } else {
                Session::flash('message', 'Something went wrong!');
                Session::flash('alert-class', 'alert-danger');
                return response()->json([
                    'isSuccess' => true,
                    'Message' => "Something went wrong!"
                ], 200); // Status code here
            }
        }
    }
}
