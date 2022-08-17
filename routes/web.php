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
    Route::get('admin/news', [NewsController::class,'news_list'])->name('admin.news.list');
    Route::get('admin/news/create', [NewsController::class,'create'])->name('admin.news.create');
    Route::post('admin/news/create', [NewsController::class,'postCreate'])->name('admin.news.store');
    Route::get('admin/news/edit', [NewsController::class,'edit'])->name('admin.news.edit');
    Route::post('admin/news/edit', [NewsController::class,'postEdit'])->name('admin.news.update');
    Route::post('admin/news/delete', [NewsController::class,'delete'])->name('admin.news.delete');
    Route::post('admin/news/status', [NewsController::class,'status'])->name('admin.news.status');
    /**ADMIN CATEGORY NEWS */
    Route::get('admin/categoriesNew',[CategoryNewController::class,'index'])->name('admin.categoriesNew.list');
    Route::post('admin/categoriesNew/save',[CategoryNewController::class,'postCreate'])->name('admin.categoriesNew.store');
    Route::post('admin/categoriesNew/delete',[CategoryNewController::class,'postDelete'])->name('admin.categoriesNew.delete');
    /**ADMIN TAG NEWS */
    Route::get('admin/tagsNew',[TagNewController::class,'index'])->name('admin.tagsNew.list');
    Route::post('admin/tagsNew/save',[TagNewController::class,'postCreate'])->name('admin.tagsNew.store');
    Route::post('admin/tagsNew/delete',[TagNewController::class,'postDelete'])->name('admin.tagsNew.delete');
});