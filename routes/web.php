<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\dashboard_controller;
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
use App\Http\Controllers\backend\setup\designation_controller;

use App\Http\Controllers\backend\student\student_reg_controller;
use App\Http\Controllers\backend\student\student_attendance_controller;
use App\Http\Controllers\backend\student\student_roll_controller;
use App\Http\Controllers\backend\student\registration_fee_controller;
use App\Http\Controllers\backend\student\semester_fee_controller;
use App\Http\Controllers\backend\student\exam_fee_controller;

use App\Http\Controllers\backend\employee\employee_reg_controller;
use App\Http\Controllers\backend\employee\employee_salary_controller;
use App\Http\Controllers\backend\employee\employee_leave_controller;
use App\Http\Controllers\backend\employee\employee_attendance_controller;

use App\Http\Controllers\backend\marks\marks_controller;
use App\Http\Controllers\backend\marks\grade_controller;

use App\Http\Controllers\backend\default_controller;

use App\Http\Controllers\backend\marks\marksheet_controller;

use App\Http\Controllers\backend\setup\lesson_controller;
use App\Http\Controllers\backend\setup\room_controller;

use App\Http\Controllers\mpesa_controller;

use App\Http\Controllers\backend\applications\student_applications_controller;


use Laravel\Jetstream\Rules\Role;

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

// Route::get('/', function () {
//     return view('auth.login');
// });

Route::get('/', function () {
    return view('homepage');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
]);


Route::get('/dashboard', [dashboard_controller::class, 'view_content'])->name('dashboard');



Route::get('/admin/logout', [admin_controller::class, 'Logout'])->name('admin.logout');

Route::get('/users/email/acceptance', [user_controller::class, 'send_acceptance_letter'])->name('user.email.acceptance');

Route::group(['middleware' => 'auth'], function () {



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


        // EXAM TYPE ROUTES
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

        Route::post('assign/unit/store', [assign_unit_controller::class, 'store_assign_unit'])->name('store.assign.unit');

        Route::get('assign/unit/edit/{course_id}', [assign_unit_controller::class, 'edit_assign_unit'])->name('assign.unit.edit');

        Route::post('assign/unit/update/{course_id}', [assign_unit_controller::class, 'update_assign_unit'])->name('course.unit.update');

        Route::get('assign/unit/details/{course_id}', [assign_unit_controller::class, 'details_assign_unit'])->name('assign.unit.details');


        // DESIGNATION ROUTES

        Route::get('designation/view', [designation_controller::class, 'view_designation'])->name('designation.view');

        Route::get('designation/add', [designation_controller::class, 'add_designation'])->name('designation.add');

        Route::post('designation/store', [designation_controller::class, 'store_designation'])->name('store.designation');

        Route::get('designation/edit/{id}', [designation_controller::class, 'edit_designation'])->name('designation.edit');

        Route::post('designation/update/{id}', [designation_controller::class, 'update_designation'])->name('update.designation');

        Route::get('designation/delete/{id}', [designation_controller::class, 'delete_designation'])->name('designation.delete');


        // ROOM ROUTES

        Route::get('room/view', [room_controller::class, 'view_room'])->name('room.view');

        Route::get('room/add', [room_controller::class, 'add_room'])->name('room.add');

        Route::post('room/store', [room_controller::class, 'store_room'])->name('store.room');

        Route::get('room/edit/{id}', [room_controller::class, 'edit_room'])->name('room.edit');

        Route::post('room/update/{id}', [room_controller::class, 'update_room'])->name('update.room');

        Route::get('room/delete/{id}', [room_controller::class, 'delete_room'])->name('room.delete');


        // LESSON ROUTES
        Route::get('lesson/view', [lesson_controller::class, 'view_lessons'])->name('lesson.view');

        Route::get('lesson/course/select', [lesson_controller::class, 'course_select'])->name('lesson.course.select');

        Route::get('lesson/add', [lesson_controller::class, 'add_lesson'])->name('lesson.add');

        Route::post('lesson/store', [lesson_controller::class, 'store_lesson'])->name('store.lesson');

        Route::get('lesson/edit/{id}', [lesson_controller::class, 'edit_lesson'])->name('lesson.edit');

        Route::post('lesson/update/{id}', [lesson_controller::class, 'update_lesson'])->name('update.lesson');

        Route::get('lesson/delete/{id}', [lesson_controller::class, 'delete_lesson'])->name('lesson.delete');
    });

    Route::prefix('student')->group(function () {

        // STUDENT REGISTRATION ROUTES

        Route::get('/reg/view', [student_reg_controller::class, 'student_reg_view'])->name('student.registration.view');

        Route::get('/reg/add', [student_reg_controller::class, 'student_reg_add'])->name('student.registration.add');

        Route::post('/reg/store', [student_reg_controller::class, 'student_reg_store'])->name('store.student.registration');

        Route::get('/year/course/wise', [student_reg_controller::class, 'student_course_year'])->name('student.year.course.wise');

        Route::get('/reg/edit/{student_id}', [student_reg_controller::class, 'student_reg_edit'])->name('student.registration.edit');

        Route::post('/reg/update/{student_id}', [student_reg_controller::class, 'student_reg_update'])->name('update.student.registration');

        Route::get('/reg/promotion/{student_id}', [student_reg_controller::class, 'student_reg_promotion'])->name('student.promotion');

        Route::post('/reg/update/promotion/{student_id}', [student_reg_controller::class, 'student_update_promotion'])->name('promotion.student.registration');

        Route::get('/reg/details/{student_id}', [student_reg_controller::class, 'student_reg_details'])->name('student.registration.details');

        // STUDENT ROLL GENERATION ROUTES

        // STUDENT ATTENDANCE ROUTES
        Route::get('attendance/view/', [student_attendance_controller::class, 'attendance_view'])->name('student.attendance.view');

        Route::get('attendance/add/', [student_attendance_controller::class, 'attendance_add'])->name('student.attendance.add');

        Route::post('attendance/store/', [student_attendance_controller::class, 'attendance_store'])->name('store.student.attendance');

        Route::get('attendance/edit/{date}', [student_attendance_controller::class, 'attendance_edit'])->name('student.attendance.edit');

        Route::get('attendance/details/{date}', [student_attendance_controller::class, 'attendance_details'])->name('student.attendance.details');


        // REGISTRATION FEE ROUTES
        Route::get('/roll/generate/view', [student_roll_controller::class, 'student_roll_view'])->name('roll.generate.view');

        Route::get('/roll/getstudents', [student_roll_controller::class, 'getstudents'])->name('student.registration.getstudents');

        Route::post('/roll/generate/store', [student_roll_controller::class, 'student_roll_store'])->name('roll.generate.store');

        // REGISTRATION FEE ROUTES

        Route::get('/reg/fee/view', [registration_fee_controller::class, 'reg_fee_view'])->name('registration.fee.view');

        Route::get('/reg/fee/coursewisedata', [registration_fee_controller::class, 'reg_fee_course_data'])->name('student.registration.fee.coursewise.get');

        Route::get('/reg/fee/payslip', [registration_fee_controller::class, 'reg_fee_payslip'])->name('student.register.fee.payslip');

        // SEMESTER FEE ROUTES

        Route::get('/sem/fee/view', [semester_fee_controller::class, 'semester_fee_view'])->name('semester.fee.view');

        Route::get('/sem/fee/coursewisedata', [semester_fee_controller::class, 'sem_fee_course_data'])->name('student.semester.fee.coursewise.get');

        Route::get('/sem/fee/payslip', [semester_fee_controller::class, 'sem_fee_payslip'])->name('student.semester.fee.payslip');

        // EXAM FEE ROUTES

        Route::get('/exam/fee/view', [exam_fee_controller::class, 'exam_fee_view'])->name('exam.fee.view');

        Route::get('/exam/fee/coursewisedata', [exam_fee_controller::class, 'exam_fee_course_data'])->name('student.exam.fee.coursewise.get');

        Route::get('/exam/fee/payslip', [exam_fee_controller::class, 'exam_fee_payslip'])->name('student.exam.fee.payslip');
    });

    Route::prefix('employee')->group(function () {
        // EMPLOYEE REGISTRATION ROUTES

        Route::get('/reg/view', [employee_reg_controller::class, 'employee_view'])->name('employee.registration.view');

        Route::get('/reg/add', [employee_reg_controller::class, 'employee_add'])->name('employee.registration.add');

        Route::get('/reg/edit/{id}', [employee_reg_controller::class, 'employee_edit'])->name('employee.registration.edit');

        Route::post('/reg/update/{id}', [employee_reg_controller::class, 'employee_update'])->name('update.employee.registration');

        Route::get('/reg/details/{id}', [employee_reg_controller::class, 'employee_details'])->name('employee.registration.details');


        // EMPLOYEE SALARY ROUTES

        Route::get('/salary/view', [employee_salary_controller::class, 'salary_view'])->name('employee.salary.view');

        Route::get('/salary/increment/{id}', [employee_salary_controller::class, 'salary_increment'])->name('employee.salary.increment');

        Route::post('salary/update/increment/{id}', [employee_salary_controller::class, 'update_increment'])->name('update.increment.store');


        Route::get('salary/details/{id}', [employee_salary_controller::class, 'salary_details'])->name('employee.salary.details');
    });
}); // END MIDDLEWARE AUTH ROUTE

        Route::get('salary/details/{id}', [employee_salary_controller::class, 'salary_details'])->name('employee.salary.details');

        // EMPLOYEE LEAVE ROUTES

        Route::get('leave/view/', [employee_leave_controller::class, 'leave_view'])->name('employee.leave.view');

        Route::get('leave/add/', [employee_leave_controller::class, 'leave_add'])->name('employee.leave.add');

        Route::post('leave/store/', [employee_leave_controller::class, 'leave_store'])->name('store.employee.leave');

        Route::get('leave/edit/{id}', [employee_leave_controller::class, 'leave_edit'])->name('employee.leave.edit');

        Route::post('leave/update/{id}', [employee_leave_controller::class, 'leave_update'])->name('update.employee.leave');

        Route::get('leave/delete/{id}', [employee_leave_controller::class, 'leave_delete'])->name('employee.leave.delete');

        // EMPLOYEE ATTENDANCE ROUTES

        Route::get('attendance/view/', [employee_attendance_controller::class, 'attendance_view'])->name('employee.attendance.view');

        Route::get('attendance/add/', [employee_attendance_controller::class, 'attendance_add'])->name('employee.attendance.add');

        Route::post('attendance/store/', [employee_attendance_controller::class, 'attendance_store'])->name('store.employee.attendance');

        Route::get('attendance/edit/{date}', [employee_attendance_controller::class, 'attendance_edit'])->name('employee.attendance.edit');

        Route::get('attendance/details/{date}', [employee_attendance_controller::class, 'attendance_details'])->name('employee.attendance.details');
    });

    Route::prefix('marks')->group(function () {
        // EMPLOYEE REGISTRATION ROUTES

        Route::get('/marks/entry/add', [marks_controller::class, 'marks_add'])->name('marks.entry.add');

        Route::post('/marks/entry/store', [marks_controller::class, 'marks_store'])->name('marks.entry.store');

        // MARK GRADE ROUTES

        Route::get('/marks/grade/view', [grade_controller::class, 'marks_grade_view'])->name('marks.entry.grade');

        Route::get('/marks/grade/add', [grade_controller::class, 'marks_grade_add'])->name('marks.grade.add');

        Route::post('/marks/grade/store', [grade_controller::class, 'marks_grade_store'])->name('store.marks.grade');
        Route::post('/reg/store', [employee_reg_controller::class, 'employee_store'])->name('store.employee.registration');

        Route::get('/reg/edit/{id}', [employee_reg_controller::class, 'employee_edit'])->name('employee.registration.edit');

        Route::post('/reg/update/{id}', [employee_reg_controller::class, 'employee_update'])->name('update.employee.registration');
    });

    Route::get('/marks/getunit', [default_controller::class, 'get_unit'])->name('marks.getunit');

    Route::get('student/marks/getstudents', [default_controller::class, 'get_students'])->name('student.marks.getstudents');


    // MARKSHEET GENERATION ROUTES
    Route::get('/marksheet/generate/view', [marksheet_controller::class, 'marksheet_view'])->name('marksheet.generate.view');

    Route::get('/marksheet/generate/get', [marksheet_controller::class, 'marksheet_get'])->name('marksheet.get');
    Route::get('/reg/details/{id}', [employee_reg_controller::class, 'employee_details'])->name('employee.registration.details');


    // EMPLOYEE SALARY ROUTES

    Route::get('/salary/view', [employee_salary_controller::class, 'salary_view'])->name('employee.salary.view');

    Route::get('/salary/increment/{id}', [employee_salary_controller::class, 'salary_increment'])->name('employee.salary.increment');

    Route::post('salary/update/increment/{id}', [employee_salary_controller::class, 'update_increment'])->name('update.increment.store');

    Route::post('salary/details/{id}', [employee_salary_controller::class, 'salary_details'])->name('employee.salary.details');
});

// MPESA FEE PAYMENT


Route::get('/payment/fee', [mpesa_controller::class, 'stk_simulation'])->name('mpesa.payment.view');



// APPLICATION ROUTES

Route::prefix('applications')->group(function () {
    Route::get('/', [student_applications_controller::class, 'student_application_view'])->name('student.applications');

    Route::post('/store', [student_applications_controller::class, 'student_application_store'])->name('student.applications.store');

    Route::get('/view', [student_applications_controller::class, 'student_application_review'])->name('applications.view');

});





// END MIDDLEWARE AUTH ROUTE
