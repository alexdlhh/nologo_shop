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
Route::get('/',[HomeController::class, 'index'])->name('home');
Route::get('especialidades/{menu1?}/{menu2?}',[EspecialidadesController::class, 'frontPage'])->name('front.especialidades');
Route::get('noticia/{menu1?}/{menu2?}/{alias?}',[NewsController::class, 'frontPage'])->name('front.new');
Route::get('noticias/{menu1?}/{menu2?}',[NewsController::class, 'frontPageList'])->name('front.news.list');
Route::get('calendar/{menu1?}/{menu2?}',[CalendarController::class, 'frontPage'])->name('front.calendar');
Route::get('media/{menu1?}/{menu2?}',[MediaController::class, 'frontPageMultimedia'])->name('front.media');
Route::get('revistas/{menu1?}/{menu2?}',[JournalController::class, 'frontPageRevista'])->name('front.revista');
Route::get('schools/{menu1?}/{menu2?}',[SchoolController::class, 'frontPage'])->name('front.cursos');
Route::get('normativa/{menu1?}/{menu2?}',[SchoolController::class, 'frontPage'])->name('front.escuela');
Route::get('patrocinadores/{menu1?}',[SponsorController::class, 'frontPage'])->name('front.sponsor');
Route::get('rfeg/{menu1?}/{menu2?}',[RFEGController::class, 'frontPage'])->name('front.rfeg');
Route::get('getNewsScroll/{pag?}',[NewsController::class, 'getNewsScroll'])->name('getNewsScroll');
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
    Route::get('admin/equipos/{especialidad}/{year}/{search}',[EspecialidadController::class,'getAll'])->name('admin.equipo.list');
    Route::get('admin/equipo/{id}',[EspecialidadController::class,'getOne'])->name('admin.equipo.edit');
    Route::get('admin/equipo/create/{especialidad}',[EspecialidadController::class,'create'])->name('admin.equipo.create');
    Route::post('admin/equipo/save',[EspecialidadController::class,'postCreate'])->name('admin.equipo.store');
    Route::post('admin/equipo/delete',[EspecialidadController::class,'postDelete'])->name('admin.equipo.delete');
    Route::post('admin/edit_especialidad/team/reorder',[EspecialidadController::class,'postReorder'])->name('admin.equipo.reorder');
    Route::post('admin/edit_especialidad/team/new',[EspecialidadController::class,'postTeamNew'])->name('admin.equipo.new');
    Route::post('admin/edit_especialidad/team/edit',[EspecialidadController::class,'postTeamEdit'])->name('admin.equipo.edits');
    Route::post('admin/edit_especialidad/team/delete',[EspecialidadController::class,'postTeamDelete'])->name('admin.equipo.delete');
    /**ADMIN NORMATIVA */
    Route::get('admin/normativas/{especialidad}/{year}',[NormativaController::class,'getAll'])->name('admin.normativas.list');
    Route::get('admin/normativa/{id}',[NormativaController::class,'getOne'])->name('admin.normativas.edit');
    Route::get('admin/normativa/create/{year}',[NormativaController::class,'create'])->name('admin.normativas.create');
    Route::post('admin/edit_especialidad/normativa/new',[NormativaController::class,'postCreate'])->name('admin.normativas.store');
    Route::post('admin/edit_especialidad/normativa/edit',[NormativaController::class,'postEdit'])->name('admin.normativas.edits');
    Route::post('admin/normativa/delete',[NormativaController::class,'postDelete'])->name('admin.normativas.delete');
    /**ADMIN RESULTADOS */
    Route::get('admin/resultados/{especialidad}/{year}',[ResultadosController::class,'getAll'])->name('admin.resultados.list');
    Route::get('admin/resultado/{id}',[ResultadosController::class,'getOne'])->name('admin.resultados.edit');
    Route::get('admin/resultado/create/{year}',[ResultadosController::class,'create'])->name('admin.resultados.create');
    Route::post('admin/edit_especialidad/resultado/new',[ResultadosController::class,'postCreate'])->name('admin.resultados.store');
    Route::post('admin/edit_especialidad/resultado/edit',[ResultadosController::class,'postCreate'])->name('admin.resultados.edits');
    Route::post('admin/resultado/delete',[ResultadosController::class,'postDelete'])->name('admin.resultados.delete');
    /**ADMIN EN DIRECTO */
    Route::get('admin/directo/{especialidad}/{year}',[DirectoController::class,'getAll'])->name('admin.directo.list');
    Route::get('admin/directo/{id}',[DirectoController::class,'getOne'])->name('admin.directo.edit');
    Route::get('admin/directo/create',[DirectoController::class,'create'])->name('admin.directo.create');
    Route::post('admin/directo/save',[DirectoController::class,'postCreate'])->name('admin.directo.store');
    Route::post('admin/directo/delete',[DirectoController::class,'postDelete'])->name('admin.directo.delete');
    /**ADMIN CALENDARIO NACIONAL */
    Route::get('admin/calendario/{especialidad}/{year}',[CalendarioController::class,'getAll'])->name('admin.calendario.list');
    Route::get('admin/calendario/{id}',[CalendarioController::class,'getOne'])->name('admin.calendario.edit');
    Route::get('admin/calendario/create',[CalendarioController::class,'create'])->name('admin.calendario.create');
    Route::post('admin/calendario/save',[CalendarioController::class,'postCreate'])->name('admin.calendario.store');
    Route::post('admin/calendario/delete',[CalendarioController::class,'postDelete'])->name('admin.calendario.delete');
    /**ADMIN CALENDARIO INTERNACIONAL */
    Route::get('admin/calendario-internacional/{especialidad}/{year}',[CalendarioInternacionalController::class,'getAll'])->name('admin.calendario-internacional.list');
    Route::get('admin/calendario-internacional/{id}',[CalendarioInternacionalController::class,'getOne'])->name('admin.calendario-internacional.edit');
    Route::get('admin/calendario-internacional/create',[CalendarioInternacionalController::class,'create'])->name('admin.calendario-internacional.create');
    Route::post('admin/calendario-internacional/save',[CalendarioInternacionalController::class,'postCreate'])->name('admin.calendario-internacional.store');
    Route::post('admin/calendario-internacional/delete',[CalendarioInternacionalController::class,'postDelete'])->name('admin.calendario-internacional.delete');
    /**ADMIN COMISIONES TECNICAS */
    Route::get('admin/comisiones/{especialidad}/{year}',[ComisionesController::class,'getAll'])->name('admin.comisiones.list');
    Route::get('admin/comisiones/{id}',[ComisionesController::class,'getOne'])->name('admin.comisiones.edit');
    Route::get('admin/comisiones/create',[ComisionesController::class,'create'])->name('admin.comisiones.create');
    Route::post('admin/comisiones/save',[ComisionesController::class,'postCreate'])->name('admin.comisiones.store');
    Route::post('admin/comisiones/delete',[ComisionesController::class,'postDelete'])->name('admin.comisiones.delete');
    /**ADMIN INFORMACION */
    Route::get('admin/informacion/{especialidad}/{year}',[InformacionController::class,'getAll'])->name('admin.informacion.list');
    Route::get('admin/informacion/{id}',[InformacionController::class,'getOne'])->name('admin.informacion.edit');
    Route::get('admin/informacion/create',[InformacionController::class,'create'])->name('admin.informacion.create');
    Route::post('admin/informacion/save',[InformacionController::class,'postCreate'])->name('admin.informacion.store');
    Route::post('admin/informacion/delete',[InformacionController::class,'postDelete'])->name('admin.informacion.delete');
    /**ADMIN RFEG */
    /**ADMIN REGLAMENTOS */
    Route::get('admin/reglamentos',[ReglamentosController::class,'getAll'])->name('admin.reglamentos.list');
    Route::get('admin/reglamento/{id}',[ReglamentosController::class,'getOne'])->name('admin.reglamentos.edit');
    Route::get('admin/reglamento/create',[ReglamentosController::class,'create'])->name('admin.reglamentos.create');
    Route::post('admin/reglamento/save',[ReglamentosController::class,'postCreate'])->name('admin.reglamentos.store');
    Route::post('admin/reglamento/delete',[ReglamentosController::class,'postDelete'])->name('admin.reglamentos.delete');
    /**ADMIN ORGANOS DE GOBIERNO */
    Route::get('admin/refg/organos/{year}',[OrganosController::class,'getAll'])->name('admin.organos.list');
    Route::get('admin/refg/ocupacion/organos/',[OrganosController::class,'getOcupacion'])->name('admin.organos.list');
    Route::get('admin/organo/{id}',[OrganosController::class,'getOne'])->name('admin.organos.edit');
    Route::get('admin/organo/ocupacion/{id}',[OrganosController::class,'getOneOcupacion'])->name('admin.organos.edit');
    Route::get('admin/organos/create',[OrganosController::class,'create'])->name('admin.organos.create');
    Route::get('admin/organos/ocupacion/create',[OrganosController::class,'createOcupacion'])->name('admin.organos.create');
    Route::post('admin/organos/save',[OrganosController::class,'postCreate'])->name('admin.organos.store');
    Route::post('admin/organos/ocupacion/save',[OrganosController::class,'postCreateOcupacion'])->name('admin.organos.store');
    Route::post('admin/organos/ocupacion/delete',[OrganosController::class,'postDeleteOcupacion'])->name('admin.organos.delete');
    Route::post('admin/organos/delete',[OrganosController::class,'postDelete'])->name('admin.organos.delete');
    /**ADMIN MYD */
    Route::get('admin/myd/list',[MydController::class,'getAll'])->name('admin.myd.list');
    Route::get('admin/myd/list/{id}',[MydController::class,'getAllCat'])->name('admin.myd.listCat');
    Route::get('admin/myd/{id}',[MydController::class,'getOne'])->name('admin.myd.edit');
    Route::get('admin/myd/create',[MydController::class,'create'])->name('admin.myd.create');
    Route::post('admin/myd/save',[MydController::class,'postCreate'])->name('admin.myd.store');
    Route::post('admin/myd/delete',[MydController::class,'postDelete'])->name('admin.myd.delete');
    Route::get('admin/myd/Cat/{id}',[MydController::class,'getOne'])->name('admin.myd.editCat');
    Route::get('admin/myd/Cat/create',[MydController::class,'create'])->name('admin.myd.createCat');
    Route::post('admin/myd/Cat/save',[MydController::class,'postCreate'])->name('admin.myd.storeCat');
    Route::post('admin/myd/Cat/delete',[MydController::class,'postDelete'])->name('admin.myd.deleteCat');
    /**ADMIN COMUNICADOS */
    Route::get('admin/comunicados',[ComunicadosController::class,'getAll'])->name('admin.comunicados.list');
    Route::get('admin/comunicado/{id}',[ComunicadosController::class,'getOne'])->name('admin.comunicados.edit');
    Route::get('admin/comunicado/create',[ComunicadosController::class,'create'])->name('admin.comunicados.create');
    Route::post('admin/comunicado/save',[ComunicadosController::class,'postCreate'])->name('admin.comunicados.store');
    Route::post('admin/comunicado/delete',[ComunicadosController::class,'postDelete'])->name('admin.comunicados.delete');
    /**ADMIN EMPLOYEE */
    Route::get('admin/employees/{page?}/{search?}',[EmployeeController::class,'employees'])->name('admin.employees.list');
    Route::get('admin/employee/create',[EmployeeController::class,'CreateEmployee'])->name('admin.employees.create');
    Route::get('admin/employee/edit/{id}',[EmployeeController::class,'EditEmployee'])->name('admin.employees.edit');
    Route::post('admin/employees/save',[EmployeeController::class,'postCreate'])->name('admin.employees.store');
    Route::get('admin/employees/delete/{id}',[EmployeeController::class,'postDelete'])->name('admin.employees.delete');
    /**ADMIN LEYTRANSPARENCIA */
    Route::get('admin/leytransparencia',[LeyTransparenciaController::class,'getAll'])->name('admin.leytransparencia.list');
    Route::get('admin/leytransparencia/{id}',[LeyTransparenciaController::class,'getOne'])->name('admin.leytransparencia.edit');
    Route::get('admin/leytransparencia/create',[LeyTransparenciaController::class,'create'])->name('admin.leytransparencia.create');
    Route::post('admin/leytransparencia/save',[LeyTransparenciaController::class,'postCreate'])->name('admin.leytransparencia.store');
    Route::post('admin/leytransparencia/delete',[LeyTransparenciaController::class,'postDelete'])->name('admin.leytransparencia.delete');
    Route::get('admin/leytransparencia/{type}/{id}',[LeyTransparenciaController::class,'getOne'])->name('admin.leytransparencia.editpral');
    Route::get('admin/leytransparencia/{type}/create',[LeyTransparenciaController::class,'create'])->name('admin.leytransparencia.createpral');
    Route::post('admin/leytransparencia/{type}/save',[LeyTransparenciaController::class,'postCreate'])->name('admin.leytransparencia.storepral');
    Route::post('admin/leytransparencia/{type}/delete',[LeyTransparenciaController::class,'postDelete'])->name('admin.leytransparencia.deletepral');
    /**ADMIN ESTATUTOS */
    Route::get('admin/estatutos',[EstatutosController::class,'getAll'])->name('admin.estatutos.list');
    Route::get('admin/estatuto/{id}',[EstatutosController::class,'getOne'])->name('admin.estatutos.edit');
    Route::get('admin/estatuto/create',[EstatutosController::class,'create'])->name('admin.estatutos.create');
    Route::post('admin/estatuto/save',[EstatutosController::class,'postCreate'])->name('admin.estatutos.store');
    Route::post('admin/estatuto/delete',[EstatutosController::class,'postDelete'])->name('admin.estatutos.delete');
    /**ADMIN FEDERACIONES */
    Route::get('admin/federaciones',[FederacionesController::class,'getAll'])->name('admin.federaciones.list');
    Route::get('admin/federacion/{id}',[FederacionesController::class,'getOne'])->name('admin.federaciones.edit');
    Route::get('admin/federacion/create',[FederacionesController::class,'create'])->name('admin.federaciones.create');
    Route::post('admin/federacion/save',[FederacionesController::class,'postCreate'])->name('admin.federaciones.store');
    Route::post('admin/federacion/delete',[FederacionesController::class,'postDelete'])->name('admin.federaciones.delete');
    /**ADMIN ELECCIONES */
    Route::get('admin/elecciones',[EleccionesController::class,'getAll'])->name('admin.elecciones.list');
    Route::get('admin/eleccion/{id}',[EleccionesController::class,'getOne'])->name('admin.elecciones.edit');
    Route::get('admin/eleccion/create',[EleccionesController::class,'create'])->name('admin.elecciones.create');
    Route::post('admin/eleccion/save',[EleccionesController::class,'postCreate'])->name('admin.elecciones.store');
    Route::post('admin/eleccion/delete',[EleccionesController::class,'postDelete'])->name('admin.elecciones.delete');
    Route::get('admin/eleccionCharge/{id}',[EleccionesController::class,'getOneCharge'])->name('admin.elecciones.editCharge');
    Route::get('admin/eleccionCharge/create',[EleccionesController::class,'createCharge'])->name('admin.elecciones.createCharge');
    Route::post('admin/eleccion/saveCharge',[EleccionesController::class,'postCreateCharge'])->name('admin.elecciones.storeCharge');
    Route::post('admin/eleccion/deleteCharge',[EleccionesController::class,'postDeleteCharge'])->name('admin.elecciones.deleteCharge');
});