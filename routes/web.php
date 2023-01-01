<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin_controller;
use App\Http\Controllers\backend\user_controller;
use App\Http\Controllers\backend\profile_controller;
use App\Http\Controllers\backend\setup\student_course_controller;
use App\Http\Controllers\backend\setup\student_year_controller;
use App\Http\Controllers\backend\setup\student_group_controller;

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


//USER PROFILE AND CHANGE PASS

Route::prefix('profile')->group(function () {

    Route::get('/view', [profile_controller::class, 'profile_view'])->name('profile.view');

    Route::get('/edit', [profile_controller::class, 'profile_edit'])->name('profile.edit');

    Route::post('/store', [profile_controller::class, 'profile_store'])->name('profile.store');

    Route::get('/password/view', [profile_controller::class, 'password_view'])->name('password.view');
    
    Route::post('/password/update', [profile_controller::class, 'password_update'])->name('password.update');
});

//USER PROFILE AND CHANGE PASS

Route::prefix('setup')->group(function () {

    // STUDENT CLASS ROUTES

    Route::get('student/course/view', [student_course_controller::class, 'view_student'])->name('student.course.view');
    
    Route::get('student/course/add', [student_course_controller::class, 'student_course_add'])->name('student.course.add');

    Route::post('student/course/store', [student_course_controller::class, 'student_course_store'])->name('store.student.course');

    Route::get('student/course/edit/{id}', [student_course_controller::class, 'student_course_edit'])->name('student.course.edit');

    Route::post('student/course/update/{id}', [student_course_controller::class, 'student_course_update'])->name('update.student.course');

    Route::get('student/course/delete/{id}', [student_course_controller::class, 'student_course_delete'])->name('student.course.delete');

    // STUDENT YEAR ROUTES

    Route::get('student/year/view', [student_year_controller::class, 'view_year'])->name('student.year.view');

    Route::get('student/year/add', [student_year_controller::class, 'add_year'])->name('student.year.add');

    Route::post('student/year/store', [student_year_controller::class, 'store_year'])->name('student.year.store');

    Route::get('student/year/edit/{id}', [student_year_controller::class, 'edit_year'])->name('student.year.edit');

    Route::post('student/year/update/{id}', [student_year_controller::class, 'update_year'])->name('update.student.year');

    Route::get('student/year/delete/{id}', [student_year_controller::class, 'delete_year'])->name('student.year.delete');

    // STUDENT GROUP ROUTES

    Route::get('student/group/view', [student_group_controller::class, 'view_group'])->name('student.group.view');

    Route::get('student/group/add', [student_group_controller::class, 'add_group'])->name('student.group.add');

    Route::post('student/group/store', [student_group_controller::class, 'store_group'])->name('store.student.group');

    Route::get('student/group/edit/{id}', [student_group_controller::class, 'edit_group'])->name('student.group.edit');

    Route::post('student/group/update/{id}', [student_group_controller::class, 'update_group'])->name('student.group.update');

    
    
    

   
});
