<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin_controller;
use App\Http\Controllers\backend\user_controller;

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
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});

Route::get('/admin/logout', [admin_controller::class, 'Logout'])->name('admin.logout');


// USER MANAGEMENT ROUTES

Route::prefix('users')->group(function () {

    Route::get('/view', [user_controller::class, 'user_view'])->name('user.view');

    Route::get('/add', [user_controller::class, 'user_add'])->name('user.add');

    Route::post('/store', [user_controller::class, 'user_store'])->name('user.store');

    Route::get('/edit/{id}', [user_controller::class, 'user_edit'])->name('user.edit');

    Route::post('/update/{id}', [user_controller::class, 'user_update'])->name('user.update');

    Route::get('/delete/{id}', [user_controller::class, 'user_delete'])->name('user.delete');
});
