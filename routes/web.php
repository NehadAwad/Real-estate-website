<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\installmentController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=> 'admin', 'middleware'=>['admin:admin']], function(){
	Route::get('/login', [AdminController::class, 'loginForm']);
    //changed postlogin from store
	Route::post('/login',[AdminController::class, 'postLogin'])->name('admin.login');
});


//pdf genarate route
Route::get('/member/{id}/viewpdf',[AdminController::class,'viewPDF']);
Route::get('/member/{id}/pdf',[AdminController::class,'pdfDownload']);




Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');



Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// admin logout route
Route::get('admin/logout', [AdminController::class, 'loginForm'])->name('admin.logout');



Route::get('admin/home',[AdminController::class,'adminData'])->name('admin.home');
// Route::get('admin/home',function()
// {
//     return view('admin.index');
// })->name('admin.home');

Route::get('admin/all', [AdminController::class, 'all_member'])->name('admin.all');

Route::get('/member/{id}',[AdminController::class,'profile']);

Route::get('/admin/add_member',function()
{
    return view('admin.add_member');
})->name('admin.add_member');

Route::post('/store',[AdminController::class,'add']);

Route::post('/update/{id}',[AdminController::class,'update_member']);

// Installment
Route::get('/installment', [installmentController::class, 'show']);
Route::post('/installment/store', [installmentController::class, 'addInstallments'])->name('installment.add');
Route::get('/installment/store', [installmentController::class, 'addInstallments'])->name('installment.add');



