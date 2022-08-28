<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Middleware\EnsureRoleIsCorrect;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryNewController;
use App\Http\Controllers\TagNewController;

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

/**
 * AUTH
 */
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
Route::get('dashboard', [AuthController::class, 'dashboard']); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

/**
 * HOME
 */
Route::middleware([EnsureRoleIsCorrect::class])->group(function () {
    /**ADMIN NEWS */
    Route::get('admin/news/filters/{page?}/{status?}/{fecha_search?}/{searchCriteria?}', [NewsController::class,'news_list'])->name('admin.news.list');
    Route::get('admin/news/', [NewsController::class,'news_list'])->name('admin.news.list');
    Route::get('admin/news/create', [NewsController::class,'create'])->name('admin.news.create');
    Route::post('admin/news/create', [NewsController::class,'postCreate'])->name('admin.news.store');
    Route::get('admin/news/edit/{id}', [NewsController::class,'edit'])->name('admin.news.edit');
    Route::post('admin/news/edit', [NewsController::class,'postEdit'])->name('admin.news.update');
    Route::get('admin/news/delete/{id}', [NewsController::class,'delete'])->name('admin.news.delete');
    Route::post('admin/news/status', [NewsController::class,'status'])->name('admin.news.status');
    /**ADMIN CATEGORY NEWS */
    Route::get('admin/categoriesNew',[CategoryNewController::class,'index'])->name('admin.categoriesNew.list');
    Route::post('admin/categoriesNew/save',[CategoryNewController::class,'postCreate'])->name('admin.categoriesNew.store');
    Route::post('admin/categoriesNew/delete',[CategoryNewController::class,'postDelete'])->name('admin.categoriesNew.delete');
    /**ADMIN TAG NEWS */
    Route::get('admin/tagsNew',[TagNewController::class,'index'])->name('admin.tagsNew.list');
    Route::post('admin/tagsNew/save',[TagNewController::class,'postCreate'])->name('admin.tagsNew.store');
    Route::post('admin/tagsNew/delete',[TagNewController::class,'postDelete'])->name('admin.tagsNew.delete');
    /**ADMIN USER */
    Route::get('admin/users',[AuthController::class,'users'])->name('admin.users.list');
    Route::get('admin/users/filters/{role?}/{search?}',[AuthController::class,'users'])->name('admin.users.list');
    Route::post('admin/users/save',[AuthController::class,'postAdminRegistration'])->name('admin.users.store');
    Route::get('admin/users/delete/{id}',[AuthController::class,'deleteUser'])->name('admin.users.delete');
    Route::get('admin/users/edit/{id}',[AuthController::class,'editUser'])->name('admin.users.edit');
    Route::post('admin/users/edit',[AuthController::class,'updateUser'])->name('admin.users.update');
    Route::get('admin/users/create',[AuthController::class,'createUser'])->name('admin.users.create');
    /**ADMIN SCHOOL */
    Route::get('admin/schools',[AuthController::class,'schools'])->name('admin.schools.list');
    Route::get('admin/schools/filters/{search?}',[AuthController::class,'schools'])->name('admin.schools.list');
    Route::get('admin/schools/create',[AuthController::class,'createSchool'])->name('admin.schools.create');
    Route::get('admin/schools/edit/{id}',[AuthController::class,'editSchool'])->name('admin.schools.edit');
    Route::post('admin/schools/save',[AuthController::class,'postCreate'])->name('admin.schools.store');
    Route::post('admin/schools/delete',[AuthController::class,'postDelete'])->name('admin.schools.delete');
    Route::post('admin/schools/status',[AuthController::class,'postStatus'])->name('admin.schools.status');
    /**ADMIN COURSES */
    Route::get('admin/courses',[AuthController::class,'courses'])->name('admin.courses.list');
    Route::post('admin/courses/save',[AuthController::class,'postCreate'])->name('admin.courses.store');
    Route::post('admin/courses/delete',[AuthController::class,'postDelete'])->name('admin.courses.delete');
    Route::post('admin/courses/status',[AuthController::class,'postStatus'])->name('admin.courses.status');
    /**ADMIN EMPLOYEE */
    Route::get('admin/employees',[AuthController::class,'employees'])->name('admin.employees.list');
    Route::post('admin/employees/save',[AuthController::class,'postCreate'])->name('admin.employees.store');
    Route::post('admin/employees/delete',[AuthController::class,'postDelete'])->name('admin.employees.delete');
    Route::post('admin/employees/status',[AuthController::class,'postStatus'])->name('admin.employees.status');
    /**ADMIN JOURNAL */
    Route::get('admin/journals',[AuthController::class,'journals'])->name('admin.journals.list');
    Route::post('admin/journals/save',[AuthController::class,'postCreate'])->name('admin.journals.store');
    Route::post('admin/journals/delete',[AuthController::class,'postDelete'])->name('admin.journals.delete');
    Route::post('admin/journals/status',[AuthController::class,'postStatus'])->name('admin.journals.status');
    /**ADMIN MEDIA */
    Route::get('admin/media',[AuthController::class,'media'])->name('admin.media.list');
    Route::post('admin/media/save',[AuthController::class,'postCreate'])->name('admin.media.store');
    Route::post('admin/media/delete',[AuthController::class,'postDelete'])->name('admin.media.delete');
    Route::post('admin/media/status',[AuthController::class,'postStatus'])->name('admin.media.status');
    /**ADMIN PAGES */
    Route::get('admin/pages',[AuthController::class,'pages'])->name('admin.pages.list');
    Route::post('admin/pages/save',[AuthController::class,'postCreate'])->name('admin.pages.store');
    /**ADMIN SPONSOR */
    Route::get('admin/sponsors',[AuthController::class,'sponsors'])->name('admin.sponsors.list');
    Route::post('admin/sponsors/save',[AuthController::class,'postCreate'])->name('admin.sponsors.store');
    Route::post('admin/sponsors/delete',[AuthController::class,'postDelete'])->name('admin.sponsors.delete');
    Route::post('admin/sponsors/status',[AuthController::class,'postStatus'])->name('admin.sponsors.status');
    /**ADMIN RS */
    Route::get('admin/rs',[AuthController::class,'rs'])->name('admin.rs.list');
    Route::post('admin/rs/save',[AuthController::class,'postCreate'])->name('admin.rs.store');
    Route::post('admin/rs/delete',[AuthController::class,'postDelete'])->name('admin.rs.delete');
    Route::post('admin/rs/status',[AuthController::class,'postStatus'])->name('admin.rs.status');
    /**ADMIN RFEG */
});