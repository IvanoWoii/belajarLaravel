<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\GuestPageController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Backend\DashboardController;

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

Route::get('/login', function () {
    return view('login');
});


Route::post('/login_proses', function(Request $request){
    dd($request);
});

Route::get('/test2', function () {
    return "Laravel Test View 2";
});

Route::redirect('/test1', '/test2');

// Route::view('/login', 'login', ["title" => "Login Page"]);

Route::get('users/{id?}', function ($id = "indra") {
    return "Hello " . $id;
})->where('id', '.*');

Route::view('/login', 'login', [
    "title" =>  "Login Page"
])->name("login");

Route::get('/pengguna', function ($id = "indra") {
    // generating url
    $url =route('users', [
        "id" => $id,
    ]);
    // generating redirect
    return redirect()->route('users', [
        "id" => $id,
    ]);
})->where('id', '.*');

Route::get('users/{id?}', function ($id = indra) {
    return "Hello " .$id;
})->where('id', '.*')->name("users");

route::middleware(['auth'])->group(function () {
    Route::get('/transaksi', function () {
        return "Ini Transaksi Page";
    });
});

route::namespace('Admin')->group(function () {
    Route::get('/profile', function () {
        return "Ini Web Profile";
    });
});

route::domain('kuliah.laravel.com')->group(function () {
    Route::get('/test', function () {
        return "Sheeshh";
    });
});

// route::prefix('/admin')->group(function() {
//     Route::get('/dashboard', function () {
//         return "Ini Page /admin/dashboard";
//     });

//     Route::get('/users', function () {
//         return "Ini Page /admin/users";
//     });

//     Route::get('/product', function () {
//         return "Ini Page /admin/product";
//     });
// });

Route::prefix('guest')->group(function() {
    // prefix guest
    Route::resource('user', GuestPageController::class);
    // 'user' sebagai url utama, untuk mengaksesnya => /guest/user/
    // GuestPageController nama controller yang akan digunakan
});

Route::get('/homepage', [HomePageController::class, 'index']);


Route::resource('home', HomeController::class);

Route::resource('dashboard', DashboardController::class);
