<?php

use App\Http\Controllers\api\course\course_api_controller;
use App\Http\Controllers\api\user\default_api_controller;
use App\Http\Controllers\api\user\profile_api_controller;
use App\Http\Controllers\api\user\user_api_controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// COMMON ROUTES
Route::get('/getUnits', [default_api_controller::class, 'get_unit']);
Route::get('/getStudents', [default_api_controller::class, 'get_students']);

// USER MANAGEMENT ROUTES
Route::prefix('users')->group(function () {
    Route::post('/store', [user_api_controller::class, 'api_user_create']);
    Route::get('/get', [user_api_controller::class, 'api_user_get']);
    Route::get('/search', [user_api_controller::class, 'api_user_get_email']);
    Route::get('/all', [user_api_controller::class, 'api_user_all']);
    Route::put('/update', [user_api_controller::class, 'api_user_update']);
    Route::delete('/delete', [user_api_controller::class, 'api_user_delete']);
});

// PROFILE MANAGEMENT ROUTES
Route::prefix('profile')->group(function () {
    Route::put('/update', [profile_api_controller::class, 'profile_store']);
    Route::put('/passwordUpdate', [profile_api_controller::class, 'password_update']);
});

// COURSE ROUTES
Route::prefix('course')->group(function () {
    Route::post('/store', [course_api_controller::class, 'add_course']);
    Route::get('/all', [course_api_controller::class, 'all_courses']);
    Route::get('/get', [course_api_controller::class, 'find_course']);
    Route::put('/update', [course_api_controller::class, 'update_course']);
    Route::delete('/delete', [course_api_controller::class, 'delete_course']);
});


// EXAM TYPE ROUTES

// Route::post('exam/type/store', [exam_type_controller::class, 'api_store_exam_type']);
// Route::get('exam/type/all', [exam_type_controller::class, 'api_get_exam_types']);
// Route::put('exam/type/update', [exam_type_controller::class, 'api_update_exam_type']);
// Route::delete('exam/type/delete', [exam_type_controller::class, 'api_delete_exam_type']);
