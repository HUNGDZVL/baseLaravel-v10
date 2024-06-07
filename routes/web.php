<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Cpanel\ProductsController;
use App\Http\Controllers\Cpanel\AccountController;
use App\Models\User;
/*

|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Language Translation
// Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);

// Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('root');

//Update User Details
// Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
// Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');


// Định nghĩa route nhóm 'Cpanel'
// Route::prefix('cpanel')->group(function () {

//     // Route cho logout
//     Route::get('logout', [AuthController::class, 'logout'])->middleware('auth');
//     Route::match(['get', 'post'], 'logouthome', [AuthController::class, 'logouthome'])->middleware('auth');

//     // Nhóm route 'dashboard'
//     Route::prefix('dashboard')->middleware('auth')->group(function () {
//         Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
//     });
// });

// client routes
Route::prefix("category")->group(function () {
    //  index home category
    Route::get("/", [CategoryController::class, 'index'])->name('category.index');

    // edit
    Route::get("/edit/{id}", [CategoryController::class, 'edit'])->name('category.edit.id');

    //update
    Route::post("/update/{id}", [CategoryController::class, 'update'])->name('category.update.id');

    //add
    Route::get("/add", [CategoryController::class, 'addView'])->name('category.add');

    //add
    Route::post("/add", [CategoryController::class, 'add']);


    //delete
    Route::post("/delete/{id}", [CategoryController::class, 'delete'])->name('category.delete');
});

// Định nghĩa route cho resource 'products' trong namespace 'Cpanel'
Route::middleware('auth.admin')->prefix('cpanel')->group(function () {
    Route::resource('products', ProductsController::class); // cấu hình route mặc đinh resource controller

    Route::get("account", [AccountController::class, 'index'])->middleware("auth.admin.login")->name("cpanel.account");
});

// demo options routes
// test models 
Route::get('/test', function () {
    // Lấy dữ liệu từ cơ sở dữ liệu mặc định (mysql)
    $user = User::find(1);
    // Lấy dữ liệu từ cơ sở dữ liệu thứ hai (pgsql)
    return response()->json([
        'result' => 'success',
        'message' => 'Thành công',
        'data' => $user,
    ], 200);
});
// test service
Route::get('/test-service', [HomeController::class, 'service']);

// main routes
Route::get('/', [HomeController::class, 'indexHome'])->name('home');

//middleware routes
Route::get('/checkHome', [HomeController::class, 'indexHome'])->name('indexHome')->middleware('checkpermission');
// option routes

Route::get("/form", function () {
    $token = csrf_token();
    return response()->json(['token' => $token]);
});

// truyền thêm name="_token" value ="<?= csrf_token>"
Route::post("/form", function () {
    // Lấy dữ liệu từ form data
    $name = request('name');
    $email = request('age');

    // Xử lý dữ liệu, ví dụ:
    return "Hello $name, your age is $email , send by POST";
});



// truyền thêm name="_method" value ="PUT"
// truyền thêm name="_token" value ="<?= csrf_token>"
Route::put("form", function () {
    // Lấy dữ liệu từ form data
    $name = request('name');
    $email = request('age');

    // Xử lý dữ liệu, ví dụ:
    return "Hello $name, your age is $email , send by PUT";
});

// truyền thêm name="_method" value ="PATCH"
// truyền thêm name="_token" value ="<?= csrf_token>"
Route::patch("form", function () {
    return "Method patch";
});


// truyền thêm name="_method" value ="DELETE"
// truyền thêm name="_token" value ="<?= csrf_token>"
Route::delete("form", function () {
    return "Method delete";
});

// config any method $req = $_Server['request_method'];
Route::any("any", function (Request $req) {
    return $req;
});

// redirect routes
// Route::redirect("/url_form", "/url_to", 200);

// view
Route::view("show-view", "viewfe");

// add param url

// Route::get("/get-product/{id}", function ($id) {
//     return "product của id {$id}";
// });

Route::get("/get-product/{slug?}-{id?}.html", function ($slug = "", $id = "") {
    return "Tham số là {$slug}, id là {$id}";
})->where([
    'slug' => '[a-z-]+', // Ràng buộc slug chỉ chấp nhận các ký tự từ a-z
    'id' => '[0-9]+'    // Ràng buộc id chỉ chấp nhận các chữ số từ 0-9
])->name('tintuc');
//  call route by name and add params
//<?= route('tintuc', ['id' => '1', 'slug' => 'tintuc')]>


// check view blale
Route::get('{any}', [HomeController::class, 'index'])->name('index');

// config auth router
Auth::routes();
