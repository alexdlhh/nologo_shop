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
use App\Http\Controllers\EspecialidadesController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Pages\HomeController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\RFEGController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ProsearchController;
use App\Http\Controllers\MundialController;

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
//Route::get('getNewsFromServer', [NewsController::class, 'getNewsFromServer'])->name('getNewsFromServer');
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::get('formulario-transparencia', [AuthController::class, 'formularioTransparencia'])->name('formularioTransparencia');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
Route::get('dashboard', [AuthController::class, 'dashboard']); 
Route::post('updatePreferences', [AuthController::class, 'updatePreferences'])->name('updatePreferences');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/',[HomeController::class, 'index'])->name('home');
Route::get('especialidades/{menu1?}/{menu2?}',[EspecialidadesController::class, 'frontPage'])->name('front.especialidades');
Route::get('noticia/{menu1?}/{menu2?}/{alias?}',[NewsController::class, 'frontPage'])->name('front.new');
Route::get('noticias/{menu1?}/{menu2?}',[NewsController::class, 'frontPageList'])->name('front.news.list');
Route::get('calendar/{menu1?}/{menu2?}',[CalendarController::class, 'frontPage'])->name('front.calendar');
Route::get('media/',[MediaController::class, 'frontPageSubalbum'])->name('front.subalbum');
Route::get('album/{id}/{menu1?}/{menu2?}',[MediaController::class, 'frontPageMultimedia'])->name('front.media');
Route::get('revistas/{menu1?}/{menu2?}',[JournalController::class, 'frontPageRevista'])->name('front.revista');
Route::get('schools/{menu1?}/{menu2?}',[SchoolController::class, 'frontPage'])->name('front.cursos');
Route::get('normativa/{menu1?}/{menu2?}',[SchoolController::class, 'frontPage'])->name('front.escuela');
Route::get('patrocinadores/{menu1?}',[SponsorController::class, 'frontPage'])->name('front.sponsor');
Route::get('rfeg/{menu1?}/{menu2?}',[RFEGController::class, 'frontPage'])->name('front.rfeg');
Route::get('getNewsScroll/{pag?}',[NewsController::class, 'getNewsScroll'])->name('getNewsScroll');
Route::get('getMediaScroll/{pag}/{especialidad?}',[MediaController::class, 'getMediaScroll'])->name('getMediaScroll');
Route::get('getMediaScrollGeneral/{pag}/{especialidad?}/{coleccion?}/{subalbum?}',[MediaController::class, 'scrollComplete'])->name('scrollComplete');
Route::get('getNewsScrollEspecialidad/{pag}/{especialidad?}',[EspecialidadesController::class, 'getNewsScrollEspecialidad'])->name('getNewsScrollEspecialidad');
Route::get('contacto',[AuthController::class, 'contacto'])->name('contacto');
Route::get('mapa',[AuthController::class, 'mapa'])->name('mapa');
Route::get('pagina/{alias}',[PageController::class, 'frontPage'])->name('front.page');
Route::get('mundial',[MundialController::class, 'mundial'])->name('mundial');
Route::get('mundial/{section}',[MundialController::class, 'mundial_section'])->name('mundial_section');
Route::get('valencia/{section?}',[MundialController::class, 'valencia_section'])->name('mundial_section');
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
    /**ALBUMNEWS NEWS */
    Route::post('admin/albumnew/create', [NewsController::class,'uploadAlbum'])->name('admin.albumnew.store');
    Route::get('admin/albumnew/delete/{id}', [NewsController::class,'deleteAlbum'])->name('admin.albumnew.delete');
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
    /**ADMIN NORMATIVAS_SCHOOL */
    Route::get('admin/normativa_school',[SchoolController::class,'normativas'])->name('admin.normativa.list');
    Route::post('admin/normativa/save',[SchoolController::class,'save'])->name('admin.normativa.save');
    Route::get('admin/normativa/delete/{id}',[SchoolController::class,'delete'])->name('admin.normativa.delete');
    /**ADMIN COURSES */
    Route::get('admin/courses/{type?}',[CourseController::class,'courses'])->name('admin.courses.list');
    Route::post('admin/course/save',[CourseController::class,'postCreate'])->name('admin.courses.store');
    Route::get('admin/course/delete/{id}',[CourseController::class,'postDelete'])->name('admin.courses.delete');
    Route::get('admin/course/edit/{id}',[CourseController::class,'edit'])->name('admin.courses.edit');
    Route::get('admin/course/create/{type?}',[CourseController::class,'createCourse'])->name('admin.courses.create');    
    /**ADMIN JOURNAL */
    Route::get('admin/journals/{album?}/{page?}/{search?}',[JournalController::class,'journals'])->name('admin.journals.list');
    Route::get('admin/journal/create',[JournalController::class,'CreateJournal'])->name('admin.journals.create');
    Route::get('admin/journal/edit/{id}',[JournalController::class,'EditJournal'])->name('admin.journals.edit');
    Route::post('admin/journals/save',[JournalController::class,'postCreate'])->name('admin.journals.store');
    Route::get('admin/journal/delete/{id}',[JournalController::class,'postDelete'])->name('admin.journals.delete');
    /**ADMIN ALBUM */
    Route::get('admin/albums/{page?}/{search?}',[AlbumController::class,'albums'])->name('admin.albums.list');
    Route::get('admin/album/create',[AlbumController::class,'CreateAlbum'])->name('admin.album.create');
    Route::get('admin/album/edit/{id}',[AlbumController::class,'EditAlbum'])->name('admin.album.edit');
    Route::post('admin/album/save',[AlbumController::class,'postCreate'])->name('admin.album.store');
    Route::get('admin/album/delete/{id}',[AlbumController::class,'postDelete'])->name('admin.album.delete');
    /**ADMIN MEDIA */
    Route::get('admin/media_list/{coleccion?}/{search?}',[MediaController::class,'media'])->name('admin.media.list');
    Route::get('admin/media/create',[MediaController::class,'CreateMedia'])->name('admin.media.create');
    Route::get('admin/media/edit/{id}',[MediaController::class,'EditMedia'])->name('admin.media.edit');
    Route::post('admin/media/save',[MediaController::class,'postCreate'])->name('admin.media.store');
    Route::get('admin/media/delete/{id}',[MediaController::class,'postDelete'])->name('admin.media.delete');
    /**ADMIN COLECCION */
    Route::get('admin/colecciones/{page?}/{search?}',[ColeccionController::class,'colecciones'])->name('admin.colecciones.list');
    Route::get('admin/coleccion/create',[ColeccionController::class,'create'])->name('admin.coleccion.create');
    Route::get('admin/coleccion/edit/{id}',[ColeccionController::class,'edit'])->name('admin.coleccion.edit');
    Route::post('admin/coleccion/save',[ColeccionController::class,'postCreate'])->name('admin.coleccion.store');
    Route::get('admin/coleccion/delete/{id}',[ColeccionController::class,'postDelete'])->name('admin.coleccion.delete');

    Route::post('admin/subalbum/create',[ColeccionController::class,'createSubAlbum'])->name('admin.subalbum.create');
    Route::post('admin/subalbum/edit',[ColeccionController::class,'editSubAlbum'])->name('admin.subalbum.edit');
    Route::get('admin/subalbum/delete/{id}',[ColeccionController::class,'deleteSubAlbum'])->name('admin.subalbum.delete');
    /**ADMIN PAGES */
    Route::get('admin/pages',[PageController::class,'getAll'])->name('admin.pages.list');
    Route::get('admin/page/{id}',[PageController::class,'edit'])->name('admin.pages.edit');
    Route::get('admin/pages/create',[PageController::class,'create'])->name('admin.pages.create');
    Route::post('admin/pages/save',[PageController::class,'postCreate'])->name('admin.pages.store');
    /**ADMIN SPONSOR */
    Route::get('admin/sponsors',[SponsorController::class,'sponsors'])->name('admin.sponsors.list');
    Route::get('admin/sponsor/create',[SponsorController::class,'CreateSponsor'])->name('admin.sponsors.create');
    Route::get('admin/sponsor/edit/{id}',[SponsorController::class,'EditSponsor'])->name('admin.sponsors.edit');
    Route::post('admin/sponsors/save',[SponsorController::class,'postCreate'])->name('admin.sponsor.store');
    Route::get('admin/sponsor/delete/{id}',[SponsorController::class,'postDelete'])->name('admin.sponsors.delete');
    Route::post('admin/sponsors/status',[SponsorController::class,'postStatus'])->name('admin.sponsors.status');
    /**BANNERS */
    Route::get('admin/banners',[BannerController::class,'banners'])->name('admin.banners.list');
    Route::get('admin/banner/create',[BannerController::class,'CreateBanner'])->name('admin.banners.create');
    Route::get('admin/banner/edit/{id}',[BannerController::class,'EditBanner'])->name('admin.banners.edit');
    Route::post('admin/banner/save',[BannerController::class,'postCreate'])->name('admin.banners.store');
    Route::get('admin/banner/delete/{id}',[BannerController::class,'postDelete'])->name('admin.banners.delete');
    Route::post('admin/banner/status',[BannerController::class,'postStatus'])->name('admin.banners.status');
    /**ADMIN RS */
    Route::get('admin/social',[RSController::class,'rs'])->name('admin.rs.list');
    Route::get('admin/rs/create',[RSController::class,'Create'])->name('admin.rs.create');
    Route::get('admin/rs/edit/{id}',[RSController::class,'edit'])->name('admin.rs.edit');
    Route::post('admin/rs/save',[RSController::class,'postCreate'])->name('admin.rs.store');
    Route::post('admin/rs/delete',[RSController::class,'postDelete'])->name('admin.rs.delete');
    Route::post('admin/rs/status',[RSController::class,'postStatus'])->name('admin.rs.status');
    /**ADMIN ESPECIALIDADES */
    Route::get('admin/especialidades',[EspecialidadesController::class,'getAll'])->name('admin.especialidades.list');
    Route::get('admin/especialidad/{id}',[EspecialidadesController::class,'getOne'])->name('admin.especialidades.edit');
    Route::post('admin/edit_especialidad/general/',[EspecialidadesController::class,'postEditGeneral'])->name('admin.especialidades.edit.general');
    /**ADMIN EQUIPO */
    Route::get('admin/equipos/{especialidad}/{year}/{search}',[EspecialidadesController::class,'getAll'])->name('admin.equipo.list');
    Route::get('admin/equipo/{id}',[EspecialidadesController::class,'getOne'])->name('admin.equipo.edit');
    Route::get('admin/equipo/create/{especialidad}',[EspecialidadesController::class,'create'])->name('admin.equipo.create');
    Route::post('admin/equipo/save',[EspecialidadesController::class,'postCreate'])->name('admin.equipo.store');
    Route::post('admin/equipo/delete',[EspecialidadesController::class,'postDelete'])->name('admin.equipo.delete');
    Route::post('admin/edit_especialidad/team/reorder',[EspecialidadesController::class,'postReorder'])->name('admin.equipo.reorder');
    Route::post('admin/edit_especialidad/team/new',[EspecialidadesController::class,'postTeamNew'])->name('admin.equipo.new');
    Route::post('admin/edit_especialidad/team/edit',[EspecialidadesController::class,'postTeamEdit'])->name('admin.equipo.edits');
    Route::post('admin/edit_especialidad/team/delete',[EspecialidadesController::class,'postTeamDelete'])->name('admin.equipo.delete');
    /**ADMIN COMISIONES_TECNICAS ESPECIALIDADES */
    Route::post('admin/edit_especialidad/comisiones_tecnicas/reorder',[EspecialidadesController::class,'postReorderComisionesTecnicas'])->name('admin.comisiones_tecnicas.reorder');
    Route::post('admin/edit_especialidad/comisiones_tecnicas/save',[EspecialidadesController::class,'postComisionesTecnicasSave'])->name('admin.comisiones_tecnicas.save');
    Route::post('admin/edit_especialidad/comisiones_tecnicas/edit',[EspecialidadesController::class,'postComisionesTecnicasEdit'])->name('admin.comisiones_tecnicas.edits');
    Route::post('admin/edit_especialidad/comisiones_tecnicas/delete',[EspecialidadesController::class,'postComisionesTecnicasDelete'])->name('admin.comisiones_tecnicas.delete');
    /**ADMIN NORMATIVA */
    Route::get('admin/normativas/{especialidad}/{year}',[NormativaController::class,'getAll'])->name('admin.normativas.list');
    Route::get('admin/normativa/{id}',[NormativaController::class,'getOne'])->name('admin.normativas.edit');
    Route::get('admin/normativa/create/{year}',[NormativaController::class,'create'])->name('admin.normativas.create');
    Route::post('admin/edit_especialidad/normativa/new',[NormativaController::class,'postCreate'])->name('admin.normativas.store');
    Route::post('admin/edit_especialidad/normativa/edit',[NormativaController::class,'postEdit'])->name('admin.normativas.edits');
    Route::post('admin/normativa/delete',[NormativaController::class,'postDelete'])->name('admin.normativas.delete');
    /**ADMIN RESULTADOS */
    Route::post('admin/edit_especialidad/resultado/new',[EspecialidadesController::class,'resultadoSave'])->name('admin.resultados.store');
    Route::post('admin/edit_especialidad/resultado/edit',[EspecialidadesController::class,'resultadoSave'])->name('admin.resultados.edits');    
    Route::post('/admin/edit_especialidad/resultadoFile/add',[EspecialidadesController::class,'resultadoFileSave'])->name('admin.resultadosFile.add');
    Route::post('/admin/edit_especialidad/document/edit/',[EspecialidadesController::class,'postEditDocument'])->name('admin.document.edits3');
    Route::get('/admin/edit_especialidad/resultados/delete/{id}',[EspecialidadesController::class,'resultadoDelete'])->name('admin.resultados.delete');
    Route::get('/admin/edit_especialidad/resultadosfile/delete/{id}',[EspecialidadesController::class,'resultadoFileDelete'])->name('admin.resultadosFile.delete');

    /**ADMIN CALENDARIO */
    Route::get('admin/calendario/{month?}/{year?}',[CalendarController::class,'getMonth'])->name('admin.calendar.list');
    Route::get('admin/eventos/{id}',[CalendarController::class,'getOne'])->name('admin.evento.edit');
    Route::post('admin/evento/save',[CalendarController::class,'save'])->name('admin.evento.store');
    Route::get('admin/evento/delete/{id}',[CalendarController::class,'delete'])->name('admin.evento.delete');
    /**ADMIN COMISIONES TECNICAS */
    Route::get('admin/comisiones/{especialidad}/{year}',[ComisionesController::class,'getAll'])->name('admin.comisiones.list');
    Route::get('admin/comisiones/{id}',[ComisionesController::class,'getOne'])->name('admin.comisiones.edit');
    Route::get('admin/comisiones/create',[ComisionesController::class,'create'])->name('admin.comisiones.create');
    Route::post('admin/comisiones/save',[ComisionesController::class,'postCreate'])->name('admin.comisiones.store');
    Route::post('admin/comisiones/delete',[ComisionesController::class,'postDelete'])->name('admin.comisiones.delete');
    /**ADMIN INFORMACION 
    /**ADMIN RFEG */
    Route::get('admin/rfeg',[RfegController::class,'adminRFEG'])->name('admin.rfeg.section');
    Route::get('admin/rfeg/{section}/{subsection?}',[RfegController::class,'adminRFEGSection'])->name('admin.rfeg.list');
    Route::get('admin/rfeg_edit/{id}',[RfegController::class,'adminRFEGEdit'])->name('admin.rfeg.edit');
    Route::post('admin/rfeg_title/create',[RfegController::class,'createRFEGTitle'])->name('admin.rfeg_title.create');
    Route::post('admin/rfeg_title/edit',[RfegController::class,'updateRFEGTitle'])->name('admin.rfeg_title.update');
    Route::get('admin/rfeg_title/delete/{id}',[RfegController::class,'deleteRFEGTitle'])->name('admin.rfeg_title.delete');
    Route::post('admin/rfeg_tabla1/create',[RfegController::class,'createRFEGTable1'])->name('admin.rfeg_tabla1.create');
    Route::post('admin/rfeg_tabla1/edit',[RfegController::class,'updateRFEGTable1'])->name('admin.rfeg_tabla1.edit');
    Route::get('admin/rfeg_tabla1/delete/{id}',[RfegController::class,'deleteRFEGTable1'])->name('admin.rfeg_tabla1.delete');
    Route::post('admin/rfeg_tabla2/create',[RfegController::class,'createRFEGTable2'])->name('admin.rfeg_tabla2.create');
    Route::post('admin/rfeg_tabla2/edit',[RfegController::class,'updateRFEGTable2'])->name('admin.rfeg_tabla2.edit');
    Route::get('admin/rfeg_tabla2/delete/{id}',[RfegController::class,'deleteRFEGTable2'])->name('admin.rfeg_tabla2.delete');
    Route::post('admin/rfeg_tabla7/create',[RfegController::class,'createRFEGTable7'])->name('admin.rfeg_tabla7.create');
    Route::post('admin/rfeg_tabla7/edit',[RfegController::class,'updateRFEGTable7'])->name('admin.rfeg_tabla7.edit');
    Route::get('admin/rfeg_tabla7/delete/{id}',[RfegController::class,'deleteRFEGTable7'])->name('admin.rfeg_tabla7.delete');
    /**ADMIN EMPLOYEE */
    Route::get('admin/employees/{page?}/{search?}',[EmployeeController::class,'employees'])->name('admin.employees.list');
    Route::get('admin/employee/create/{rfeg_title?}',[EmployeeController::class,'CreateEmployee'])->name('admin.employees.create');
    Route::get('admin/employee/edit/{id}',[EmployeeController::class,'EditEmployee'])->name('admin.employees.edit');
    Route::post('admin/employees/save',[EmployeeController::class,'postCreate'])->name('admin.employees.store');
    Route::get('admin/employee/delete/{id}',[EmployeeController::class,'delete'])->name('admin.employees.delete');
    Route::post('admin/employee/general',[EmployeeController::class,'postGeneral'])->name('admin.employees.general');
    /**ADMIN STATICS */
    Route::get('admin/page_list/{search?}',[PageController::class,'adminPage'])->name('admin.page.section');
    Route::get('admin/page_edit/{id}',[PageController::class,'adminPageEdit'])->name('admin.page.edit');
    Route::post('admin/page/save',[PageController::class,'save'])->name('admin.page.store');
    /**ADMIN GENERAL */
    Route::get('admin/general_list/{search?}',[PageController::class,'adminGeneral'])->name('admin.general.section');
    Route::post('admin/general/save',[PageController::class,'saveGeneral'])->name('admin.general.store');
    /**PROSEARCH */
    Route::get('prosearch/{search}',[ProsearchController::class,'prosearch'])->name('prosearch');
    /**MUNDIAL */
    Route::get('admin/mundial/general',[MundialController::class,'adminMundialGeneral'])->name('adminMundialGeneral');
    Route::get('admin/mundial/mundial',[MundialController::class,'adminMundialMundial'])->name('adminMundialMundial');
    Route::get('admin/mundial/valencia',[MundialController::class,'adminMundialValencia'])->name('adminMundialValencia');
});

