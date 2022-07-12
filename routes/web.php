<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\Admin\MemberController;
use App\Models\Role;

Auth::routes();

Route::get('/', 'App\Http\Controllers\DashboardController@index');
Route::get('/home', 'App\Http\Controllers\DashboardController@index')->name('home');
Route::get('/config', 'App\Http\Controllers\ConfigController@index')->name('config');
Route::put('/config/update/{id}', 'App\Http\Controllers\ConfigController@update')->name('config.update');

Route::group(['namespace' => 'App\Http\Controllers\Profile'], function (){
	Route::get('/profile', 'ProfileController@index')->name('profile');
	Route::put('/profile/update/profile/{id}', 'ProfileController@updateProfile')->name('profile.update.profile');
	Route::put('/profile/update/password/{id}', 'ProfileController@updatePassword')->name('profile.update.password');
	Route::put('/profile/update/avatar/{id}', 'ProfileController@updateAvatar')->name('profile.update.avatar');
});

Route::group(['namespace' => 'App\Http\Controllers\Error'], function (){
	Route::get('/unauthorized', 'ErrorController@unauthorized')->name('unauthorized');
});

Route::group(['namespace' => 'App\Http\Controllers\User'], function (){
	//Admin
	Route::get('/user', 'UserController@index')->name('user');
	Route::get('/user/create', 'UserController@create')->name('user.create');
	Route::post('/user/store', 'UserController@store')->name('user.store');
	Route::get('/user/edit/{id}', 'UserController@edit')->name('user.edit');
	Route::put('/user/update/{id}', 'UserController@update')->name('user.update');
	Route::get('/user/edit/password/{id}', 'UserController@editPassword')->name('user.edit.password');
	Route::put('/user/update/password/{id}', 'UserController@updatePassword')->name('user.update.password');
	Route::get('/user/show/{id}', 'UserController@show')->name('user.show');
	Route::get('/user/destroy/{id}', 'UserController@destroy')->name('user.destroy');
	// Roles
	Route::get('/role', 'RoleController@index')->name('role');
	Route::get('/role/create', 'RoleController@create')->name('role.create');
	Route::post('/role/store', 'RoleController@store')->name('role.store');
	Route::get('/role/edit/{id}', 'RoleController@edit')->name('role.edit');
	Route::put('/role/update/{id}', 'RoleController@update')->name('role.update');
	Route::get('/role/show/{id}', 'RoleController@show')->name('role.show');
	Route::get('/role/destroy/{id}', 'RoleController@destroy')->name('role.destroy');
});
//Member
    Route::get('/member/index',[MemberController::class, 'index'])->name('member.index');
    Route::get('/member/create',[MemberController::class, 'create'])->name('member.create');
    Route::post('/member/store', [MemberController::class, 'store'])->name('member.store');
    Route::get('/member/destroy/{id}', [MemberController::class, 'destroy'])->name('member.destroy');

// Course
Route::get('/courses', [CourseController::class, 'index'])->name('course.index');
Route::get('/courses/create', [CourseController::class, 'create'])->name('course.create');
Route::post('/courses/store', [CourseController::class, 'store'])->name('course.store');
Route::get('/courses/edit/{id}', [CourseController::class, 'edit'])->name('course.edit');
Route::put('/courses/update/{id}', [CourseController::class, 'update'])->name('course.update');
Route::get('/courses/destroy/{id}', [CourseController::class, 'destroy'])->name('course.destroy');

// Tag
Route::get('/tag', [TagController::class, 'index'])->name('tag.index');
Route::get('/tag/create', [TagController::class, 'create'])->name('tag.create');
Route::post('/tag/store', [TagController::class, 'store'])->name('tag.store');
Route::get('/tag/edit/{id}', [TagController::class, 'edit'])->name('tag.edit');
Route::put('/tag/update/{id}', [TagController::class, 'update'])->name('tag.update');
Route::get('/tag/destroy/{id}', [TagController::class, 'destroy'])->name('tag.destroy');
// Lessons
Route::get('/lesson/home', [LessonController::class, 'home'])->name('lesson.home');
Route::get('/lesson/create', [LessonController::class, 'create'])->name('lesson.create');
Route::post('/lesson/store',[LessonController::class, 'store'])->name('lesson.store');
Route::get('/lesson/edit/{id}', [LessonController::class, 'edit'])->name('lesson.edit');
Route::put('/lesson/update/{id}', [LessonController::class, 'update'])->name('lesson.update');
Route::get('/lesson/destroy/{id}', [LessonController::class, 'destroy'])->name('lesson.destroy');

// Documents
Route::get('/document', [DocumentController::class, 'index'])->name('document.index');
Route::get('/document/create', [DocumentController::class, 'create'])->name('document.create');
Route::post('/document/store', [DocumentController::class, 'store'])->name('document.store');
Route::get('/document/edit/{id}', [DocumentController::class, 'edit'])->name('document.edit');
Route::put('/document/update/{id}', [DocumentController::class, 'update'])->name('document.update');
Route::get('/document/destroy/{id}', [DocumentController::class, 'destroy'])->name('document.destroy');
