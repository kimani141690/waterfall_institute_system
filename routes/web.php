<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin_controller;
use App\Http\Controllers\backend\user_controller;
use App\Http\Controllers\backend\profile_controller;
use App\Http\Controllers\backend\setup\student_course_controller;
use App\Http\Controllers\backend\setup\course_unit_controller;
use App\Http\Controllers\backend\setup\student_year_controller;
use App\Http\Controllers\backend\setup\student_group_controller;
use App\Http\Controllers\backend\setup\student_shift_controller;
use App\Http\Controllers\backend\setup\fee_category_controller;
use App\Http\Controllers\backend\setup\fee_amount_controller;
use App\Http\Controllers\backend\setup\exam_type_controller;
use App\Http\Controllers\backend\setup\assign_unit_controller;

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

    Route::get('student/group/delete/{id}', [student_group_controller::class, 'delete_group'])->name('student.group.delete');

    // STUDENT SHIFT ROUTES

    Route::get('student/shift/view', [student_shift_controller::class, 'view_shift'])->name('student.shift.view');

    Route::get('student/shift/add', [student_shift_controller::class, 'add_shift'])->name('student.shift.add');

    Route::post('student/shift/store', [student_shift_controller::class, 'store_shift'])->name('store.student.shift');

    Route::get('student/shift/edit/{id}', [student_shift_controller::class, 'edit_shift'])->name('student.shift.edit');

    Route::post('student/shift/update/{id}', [student_shift_controller::class, 'update_shift'])->name('update.student.shift');

    Route::get('student/shift/delete/{id}', [student_shift_controller::class, 'delete_shift'])->name('student.shift.delete');

    // FEE CATEGORY ROUTES

    Route::get('fee/category/view', [fee_category_controller::class, 'view_fee_cat'])->name('fee.category.view');

    Route::get('fee/category/add', [fee_category_controller::class, 'add_fee_cat'])->name('fee.category.add');

    Route::post('fee/category/store', [fee_category_controller::class, 'store_fee_cat'])->name('fee.category.store');

    Route::get('fee/category/edit/{id}', [fee_category_controller::class, 'edit_fee_cat'])->name('fee.category.edit');

    Route::post('fee/category/update/{id}', [fee_category_controller::class, 'update_fee_cat'])->name('update.fee.category');

    Route::get('fee/category/delete/{id}', [fee_category_controller::class, 'delete_fee_cat'])->name('fee.category.delete');

    // FEE CATEGORY AMOUNT ROUTES

    Route::get('fee/amount/view', [fee_amount_controller::class, 'view_fee_amount'])->name('fee.amount.view');

    Route::get('fee/amount/add', [fee_amount_controller::class, 'add_fee_amount'])->name('fee.amount.add');

    Route::post('fee/amount/store', [fee_amount_controller::class, 'store_fee_amount'])->name('store.fee.amount');

    Route::get('fee/amount/edit/{fee_category_id}', [fee_amount_controller::class, 'edit_fee_amount'])->name('fee.amount.edit');

    Route::post('fee/amount/update/{fee_category_id}', [fee_amount_controller::class, 'update_fee_amount'])->name('update.fee.amount');

    Route::get('fee/amount/details/{fee_category_id}', [fee_amount_controller::class, 'details_fee_amount'])->name('fee.amount.details');

    
  // STUDENT UNIT ROUTES

  Route::get('student/unit/view', [course_unit_controller::class, 'view_student_unit'])->name('student.unit.view');

  Route::get('student/unit/add', [course_unit_controller::class, 'add_student_unit'])->name('student.unit.add');

  Route::post('student/unit/store', [course_unit_controller::class, 'store_student_unit'])->name('course.unit.store');

  Route::get('student/unit/edit/{course_id}', [course_unit_controller::class, 'edit_student_unit'])->name('course.unit.edit');

  Route::post('student/unit/update/{course_id}', [course_unit_controller::class, 'update_student_unit'])->name('course.unit.update');

  Route::get('student/unit/details/{course_id}', [course_unit_controller::class, 'details_student_unit'])->name('course.unit.details');

  // EXAM TYPE ROUTES

  Route::get('exam/type/view', [exam_type_controller::class, 'view_exam_type'])->name('exam.type.view');

  Route::get('exam/type/add', [exam_type_controller::class, 'add_exam_type'])->name('exam.type.add');

  Route::post('exam/type/store', [exam_type_controller::class, 'store_exam_type'])->name('exam.type.store');

  Route::get('exam/type/edit/{id}', [exam_type_controller::class, 'edit_exam_type'])->name('exam.type.edit');

  Route::post('exam/type/update/{id}', [exam_type_controller::class, 'update_exam_type'])->name('update.exam.type');

  Route::get('exam/type/delete/{id}', [exam_type_controller::class, 'delete_exam_type'])->name('exam.type.delete');

  // ASSIGN UNIT ROUTES

  Route::get('assign/unit/view', [assign_unit_controller::class, 'view_assign_unit'])->name('assign.unit.view');

  Route::get('assign/unit/add', [assign_unit_controller::class, 'add_assign_unit'])->name('assign.unit.add');

  
  


   
    
    
    

   
});
