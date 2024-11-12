<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\HomeController;
// admin controller
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\CustomerPackageController;
use App\Http\Controllers\CustomerController;


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
//Trang chính index vào hàm home
Route::get('/', [IndexController::class, 'home'])->name('homepage');
Route::get('/danh-muc/{slug}', [IndexController::class, 'category'])->name('category');
Route::get('/the-loai/{slug}', [IndexController::class, 'genre'])->name('genre');
Route::get('/quoc-gia/{slug}', [IndexController::class, 'country'])->name('country');

Route::get('/phim/{slug}', [IndexController::class, 'movie'])->name('movie');
Route::get('/xem-phim/{slug}/{tap}', [IndexController::class, 'watch']);
Route::get('/so-tap', [IndexController::class, 'episode'])->name('so-tap');
Route::get('/nam/{year}', [IndexController::class,'year']);
Route::get('/tag/{tag}', [IndexController::class,'tag']);


Route::get('/pricing-plan', [IndexController::class,'pricing_plan'])->name('pricing-plan');
Route::get('/customer-login', [IndexController::class,'customer_login'])->name('customer-login');
Route::get('/customer-register', [IndexController::class,'customer_register'])->name('customer-register');
Route::get('/customer-info', [IndexController::class,'customer_info'])->name('customer-info');
Route::get('/logout-customer', [IndexController::class,'logout_customer'])->name('logout-customer');

Route::post('/insert-customer', [IndexController::class,'insert_customer'])->name('insert-customer');
Route::post('/login-customer', [IndexController::class,'login_customer'])->name('login-customer');
Route::post('/buy-package', [IndexController::class,'buy_package'])->name('buy-package');
Route::get('/change-package/{id}', [IndexController::class,'change_package'])->name('change-package');
Route::get('/nap-the', [IndexController::class,'nap_the'])->name('nap-the');
Route::post('/nap-the-cao', [IndexController::class,'nap_the_cao'])->name('nap-the-cao');
Route::get('/xem-nap-the', [IndexController::class,'xem_nap_the'])->name('xem-nap-the');

Route::get('/edit-customer/{id}', [CustomerController::class,'edit_customer'])->name('edit-customer');
Route::post('/update-customer/{id}', [CustomerController::class,'update_customer'])->name('update-customer');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// admin route
Route::resource('/category', CategoryController::class);
Route::post('resorting', [CategoryController::class,'resorting'])->name('resorting');


Route::resource('/genre', GenreController::class);
Route::resource('/country', CountryController::class);
Route::resource('/customer', CustomerController::class);
// thêm tập phim
Route::resource('/episode', EpisodeController::class);
Route::resource('/customer_package', CustomerPackageController::class);
Route::get('select-movie', [EpisodeController::class,'select_movie'])->name('select-movie');

Route::resource('/movie', MovieController::class);
Route::get('/update-year-phim', [MovieController::class,'update_year']);
Route::get('/update-season-phim', [MovieController::class,'update_season']);

// login
Route::get('/add-customer', [IndexController::class, 'add_customer'])->name('sign-up');
// Route::get('/add-customer', [IndexController::class, 'add_customer'])->name('sign-up');

