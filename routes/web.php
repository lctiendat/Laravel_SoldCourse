<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\CommentController;
use App\Http\Controllers\admin\CourseController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\Auth\FacebookSocialiteController;
use App\Http\Controllers\product\ProductController;
use App\Http\Controllers\user\HomeController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\user\LangController;
use App\Http\Controllers\user\MailController;
use App\Http\Controllers\user\NewsController;
use App\Http\Controllers\user\SearchController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

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


Route::resource('admin/categories', CategoryController::class)->middleware('checkRole');
Route::resource('admin/courses', CourseController::class)->middleware('checkRole');
Route::resource('admin/orders', OrderController::class)->middleware('checkRole');
Route::resource('admin/users', UserController::class)->middleware('checkRole');
Route::resource('admin/blogs', BlogController::class)->middleware('checkRole');
Route::resource('news', NewsController::class);
Route::resource('admin/comments', CommentController::class)->middleware('auth');
Auth::routes();
Route::get('/', [HomeController::class, 'index']);
Route::get('/', [HomeController::class, 'getData']);
Route::get('/course/{id}', [HomeController::class, 'showCourse'])->name('course.show');
Route::get('/course/addCart/{id}', [ProductController::class, 'addToCart'])->name('addToCart');
Route::get('/course/cart/show', [ProductController::class, 'showCart'])->name('showCart');
Route::get('/course/cart/update', [ProductController::class, 'updateCart'])->name('updateCart');
Route::post('/user/products/components/cart', [ProductController::class, 'storeOrder'])->name('storeOrder');
Route::get('/category/{id}', [HomeController::class, 'showCourseOfCategory'])->name('showCourseOfCategory');
Route::get('auth/facebook', [FacebookSocialiteController::class, 'redirectToFB']);
Route::get('callback/facebook', [FacebookSocialiteController::class, 'handleCallback']);
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::get('/admin/home', [AdminController::class, 'index'])->middleware('checkRole')->name('adminHome');
Route::get('/lang/{lang}', [LangController::class, 'changeLang'])->name('lang');
Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
});
Route::get('send-mail', [MailController::class, 'sendMail']);

Route::get('/course/cart/delete', [ProductController::class, 'deleteProduct'])->name('deleteProduct');
// Route::get('/posts/{any}', function () {
//     return view('post');
//   })->where('any', '.*');
Route::get('export', [HomeController::class, 'exportOrder'])->name('exportOrder');
