<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Middleware\EnsureRoleIsCorrect;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryNewController;
use App\Http\Controllers\TagNewController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\CourseController; 
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\ColeccionController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\RSController;

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
    Route::get('admin/schools',[SchoolController::class,'schools'])->name('admin.schools.list');
    Route::get('admin/schools/{page?}/{search?}',[SchoolController::class,'schools'])->name('admin.schools.list');
    Route::get('admin/school/create',[SchoolController::class,'createSchool'])->name('admin.schools.create');
    Route::get('admin/school/edit/{id}',[SchoolController::class,'editSchool'])->name('admin.schools.edit');
    Route::post('admin/school/save',[SchoolController::class,'postCreate'])->name('admin.schools.store');
    Route::get('admin/school/delete/{id}',[SchoolController::class,'postDelete'])->name('admin.schools.delete');
    Route::post('admin/school/status',[SchoolController::class,'postStatus'])->name('admin.schools.status');
    /**ADMIN COURSES */
    Route::get('admin/courses/{school_id?}/{page?}/{search?}',[CourseController::class,'courses'])->name('admin.courses.list');
    Route::post('admin/course/save',[CourseController::class,'postCreate'])->name('admin.courses.store');
    Route::get('admin/course/delete/{id}',[CourseController::class,'postDelete'])->name('admin.courses.delete');
    Route::get('admin/course/edit/{id}',[CourseController::class,'edit'])->name('admin.courses.edit');
    Route::get('admin/course/create',[CourseController::class,'createCourse'])->name('admin.courses.create');
    /**ADMIN EMPLOYEE */
    Route::get('admin/employees/{page?}/{search?}',[EmployeeController::class,'employees'])->name('admin.employees.list');
    Route::get('admin/employee/create',[EmployeeController::class,'CreateEmployee'])->name('admin.employees.create');
    Route::get('admin/employee/edit/{id}',[EmployeeController::class,'EditEmployee'])->name('admin.employees.edit');
    Route::post('admin/employees/save',[EmployeeController::class,'postCreate'])->name('admin.employees.store');
    Route::get('admin/employees/delete/{id}',[EmployeeController::class,'postDelete'])->name('admin.employees.delete');
    /**ADMIN JOURNAL */
    Route::get('admin/journals/{album?}/{page?}/{search?}',[JournalController::class,'journals'])->name('admin.journals.list');
    Route::get('admin/journal/create',[JournalController::class,'CreateJournal'])->name('admin.journals.create');
    Route::get('admin/journal/edit/{id}',[JournalController::class,'EditJournal'])->name('admin.journals.edit');
    Route::post('admin/journals/save',[JournalController::class,'postCreate'])->name('admin.journals.store');
    Route::get('admin/journal/delete/{id}',[JournalController::class,'postDelete'])->name('admin.journals.delete');
    /**ADMIN ALBUM */
    Route::get('admin/albums/{page?}/{search?}',[AlbumController::class,'albums'])->name('admin.albums.list');
    Route::get('admin/album/create',[AlbumController::class,'CreateAlbum'])->name('admin.albums.create');
    Route::get('admin/album/edit/{id}',[AlbumController::class,'EditAlbum'])->name('admin.album.edit');
    Route::post('admin/album/save',[AlbumController::class,'postCreate'])->name('admin.album.store');
    Route::get('admin/album/delete/{id}',[AlbumController::class,'postDelete'])->name('admin.albums.delete');
    /**ADMIN MEDIA */
    Route::get('admin/media_list/{coleccion?}/{search?}',[MediaController::class,'media'])->name('admin.media.list');
    Route::get('admin/media/create',[MediaController::class,'CreateMedia'])->name('admin.media.create');
    Route::get('admin/media/edit/{id}',[MediaController::class,'EditMedia'])->name('admin.media.edit');
    Route::post('admin/media/save',[MediaController::class,'postCreate'])->name('admin.media.store');
    Route::get('admin/media/delete/{id}',[MediaController::class,'postDelete'])->name('admin.media.delete');
    /**ADMIN COLECCION */
    Route::get('admin/colecciones/{page?}/{search?}',[ColeccionController::class,'colecciones'])->name('admin.colecciones.list');
    Route::get('admin/colecciones/create',[ColeccionController::class,'CreateColeccion'])->name('admin.colecciones.create');
    Route::get('admin/colecciones/edit/{id}',[ColeccionController::class,'EditColeccion'])->name('admin.colecciones.edit');
    Route::post('admin/colecciones/save',[ColeccionController::class,'postCreate'])->name('admin.colecciones.store');
    Route::get('admin/colecciones/delete/{id}',[ColeccionController::class,'postDelete'])->name('admin.colecciones.delete');
    /**ADMIN PAGES */
    Route::get('admin/pages',[AuthController::class,'pages'])->name('admin.pages.list');
    Route::post('admin/pages/save',[AuthController::class,'postCreate'])->name('admin.pages.store');
    /**ADMIN SPONSOR */
    Route::get('admin/sponsors',[SponsorController::class,'sponsors'])->name('admin.sponsors.list');
    Route::post('admin/sponsors/save',[SponsorController::class,'postCreate'])->name('admin.sponsors.store');
    Route::post('admin/sponsors/delete',[SponsorController::class,'postDelete'])->name('admin.sponsors.delete');
    Route::post('admin/sponsors/status',[SponsorController::class,'postStatus'])->name('admin.sponsors.status');
    /**ADMIN RS */
    Route::get('admin/social',[RSController::class,'rs'])->name('admin.rs.list');
    Route::post('admin/rs/save',[RSController::class,'postCreate'])->name('admin.rs.store');
    Route::post('admin/rs/delete',[RSController::class,'postDelete'])->name('admin.rs.delete');
    Route::post('admin/rs/status',[RSController::class,'postStatus'])->name('admin.rs.status');
    /**ADMIN ESPECIALIDADES */
    Route::get('admin/especialidades',[AuthController::class,'especialidades'])->name('admin.especialidades.list');
    /**ADMIN RFEG */


});