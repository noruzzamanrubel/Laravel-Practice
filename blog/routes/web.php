<?php

use App\Http\Controllers\MyController;
use App\Http\Controllers\SingleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\NewController;
use App\Http\Controllers\PostController;

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

Route::get('/', [SiteController::class, 'home']);
Route::get('/about', [SiteController::class, 'about']);
Route::get('/contact', [SiteController::class, 'contact']);

//Category crud here
Route::get('add/category', [SiteController::class, 'addcategory']);
Route::get('all/category', [SiteController::class, 'allcategory'])->name('all.category');
Route::post('store/category', [SiteController::class, 'storecategory']);
Route::get('view/category/{id}', [SiteController::class, 'viewcategory']);
Route::get('delete/category/{id}', [SiteController::class, 'deletecategory']);
Route::get('edit/category/{id}', [SiteController::class, 'editcategory']);
Route::get('update/category/{id}', [SiteController::class, 'updatecategory'])->name('update.category');

//Post crud here
Route::get('/blog',[PostController::class, 'blogpost']);
Route::post('store/post', [PostController::class, 'storepost'])->name('store.post');
Route::get('all/post', [PostController::class, 'allpost'])->name('all.post');

// Route::get('/{name}/{email}/{phone}', [SiteController::class, 'home']);

// Route::group(['prefix' => 'account'], function () {

//     Route::get('/login', [SiteController::class, 'login']);

//     Route::get('/logout', function () {
//         return "Logout";
//     });
//     Route::get('/update', function () {
//         return "Update";
//     });
// });

// Route::get('/single', [NewController::class, '__invoke']);
