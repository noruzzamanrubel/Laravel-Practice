<?php

use App\Http\Controllers\BoomdevsController;
use App\Http\Controllers\MyController;
use App\Http\Controllers\SingleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\NewController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\StudentController;

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
Route::get('view/post/{id}',[PostController::class, 'viewpost'])->name('view.post');
Route::get('edit/post/{id}',[PostController::class, 'editpost'])->name('edit.post');
Route::get('update/post/{id}', [PostController::class, 'updatepost'])->name('update.post');

//Student 
Route::get('/student', [StudentController::class, 'student']);
Route::get('add/student', [StudentController::class, 'addstudent'])->name('add.student');
Route::get('all/student', [StudentController::class, 'allstudent'])->name('all.student');
Route::post('store/student', [StudentController::class, 'storeStudent'])->name('store.student');
Route::get('view/student/{id}', [StudentController::class, 'viewStudent'])->name('view.student');
Route::get('delete/student/{id}', [StudentController::class, 'deleteStudent'])->name('delete.student');
Route::get('edit/student/{id}', [StudentController::class, 'editStudent'])->name('edit.student');
Route::get('update/student/{id}', [StudentController::class, 'updateStudent'])->name('update.student');


//Boomdevs
Route::get('/boomdevs', [BoomdevsController::class, 'boomdevs']);
Route::get('/add/developer', [BoomdevsController::class, 'addDeveloper'])->name('add.developer');
Route::get('/all/developer', [BoomdevsController::class, 'allDeveloper'])->name('all.developer');
Route::post('/store/developer', [BoomdevsController::class, 'storeDeveloper'])->name('store.developer');
Route::get('view/developer/{id}', [BoomdevsController::class, 'viewDeveloper'])->name('view.developer');
Route::get('edit/developer/{id}', [BoomdevsController::class, 'editDeveloper'])->name('edit.developer');
Route::get('delete/developer/{id}', [BoomdevsController::class, 'deleteDeveloper'])->name('delete.developer');
Route::get('update/developer/{id}', [BoomdevsController::class, 'updateDeveloper'])->name('update.developer');
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
