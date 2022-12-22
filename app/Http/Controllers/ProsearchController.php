<?php

namespace App\Http\Controllers;
use App\Http\Repository\PagesRepository;
use App\Http\Repository\NewsRepository;
use App\Http\Repository\RSRepository;
use App\Http\Repository\SponsorRepository;
use App\Http\Repository\GeneralRepository;
use App\Http\Repository\EventoRepository;
use App\Http\Repository\AlbumRepository;
use App\Http\Repository\JournalRepository;
use App\Http\Repository\BannerRepository;
use App\Http\Repository\CategoryNewRepository;
use App\Http\Repository\TagNewRepository;
use App\Http\Repository\AlbumNewRepository;
use App\Http\Repository\Table1Repository;
use App\Http\Repository\Table2Repository;
use App\Http\Repository\Table7Repository;
use App\Http\Repository\RFEGTitleRepository;
use App\Http\Repository\EmployeeRepository;
use App\Http\Repository\EspecialidadesRepository;
use App\Http\Repository\SchoolRepository;
use App\Http\Repository\CourseRepository;
use App\Http\Repository\MediaRepository;
use App\Http\Repository\TeamRepository;
use App\Http\Repository\ComisionesTecnicasRepository;
use App\Http\Repository\ColeccionRepository;
use App\Http\Repository\ResultadosRepository;

class ProsearchController extends Controller
{
    public function __construct()
    {
    }

    /**
     * Vamos a buscar el parametro de búsqueda por toda la base de datos
     */
    public function prosearch($search){
        $pageRepository = new PagesRepository();
        $newRepository = new NewsRepository();
        $RSRepository = new RSRepository();
        $sponsorRepository = new SponsorRepository();  
        $courseRepository = new CourseRepository();    
        $rfegTitleRepository = new RFEGTitleRepository();  
        $schoolRepository = new SchoolRepository();
        $generalRepository = new GeneralRepository();
        $eventoRepository = new EventoRepository();
        $albumRepository = new AlbumRepository();
        $journalRepository = new JournalRepository();
        $bannerRepository = new BannerRepository();
        $categoryNewRepository = new CategoryNewRepository();
        $table1Repository = new Table1Repository();
        $table2Repository = new Table2Repository();
        $table7Repository = new Table7Repository();
        $employeeRepository = new EmployeeRepository();
        $especialidadesRepository = new EspecialidadesRepository();
        $teamRepository = new TeamRepository();
        $mediaRepository = new MediaRepository();
        $comisionesTecnicasRepository = new ComisionesTecnicasRepository();
        $coleccionRepository = new ColeccionRepository();
        $resultadosRepository = new ResultadosRepository();

        $news = $newRepository->search($search);
        $rs = $RSRepository->search($search);
        $sponsors = $sponsorRepository->search($search);
        $rfeg_title = $rfegTitleRepository->search($search);
        $courses = $courseRepository->search($search);
        $normativas = $schoolRepository->search($search);
        $events = $eventoRepository->search($search);
        $albums = $albumRepository->search($search);
        $journals = $journalRepository->search($search);
        $banners = $bannerRepository->search($search);
        $categories = $categoryNewRepository->search($search);
        $table1 = $table1Repository->search($search);
        $table2 = $table2Repository->search($search);
        $table7 = $table7Repository->search($search);
        $employees = $employeeRepository->search($search);
        $especialidades = $especialidadesRepository->search($search);
        $page = $pageRepository->search($search);
        $general = $generalRepository->search($search);
        $teams = $teamRepository->search($search);
        $medias = $mediaRepository->search($search);
        $comisionesTecnicas = $comisionesTecnicasRepository->search($search);
        $colecciones = $coleccionRepository->search($search);
        $resultados = $resultadosRepository->search($search);

        $data = [
            'news' => $news,
            'rs' => $rs,
            'sponsors' => $sponsors,
            'rfeg_title' => $rfeg_title,
            'courses' => $courses,
            'normativas' => $normativas,
            'events' => $events,
            'albums' => $albums,
            'journals' => $journals,
            'banners' => $banners,
            'categories' => $categories,
            'table1' => $table1,
            'table2' => $table2,
            'table7' => $table7,
            'employees' => $employees,
            'especialidades' => $especialidades,
            'page' => $page,
            'general' => $general,
            'teams' => $teams,
            'medias' => $medias,
            'comisionesTecnicas' => $comisionesTecnicas,
            'colecciones' => $colecciones,
            'resultados' => $resultados,
        ];

        //lo devolvemos como JSON para que lo pueda leer el JS sin problemas de CORS ni caracteres raros
        return response()->json($data);
    }

    /**
     * Vamos a buscar el parametro de búsqueda por toda la base de datos
     */
    public function basicSearch($search){
        $pageRepository = new PagesRepository();
        $newRepository = new NewsRepository();
        $RSRepository = new RSRepository();
        $sponsorRepository = new SponsorRepository();  
        $courseRepository = new CourseRepository();    
        $rfegTitleRepository = new RFEGTitleRepository();  
        $schoolRepository = new SchoolRepository();
        $generalRepository = new GeneralRepository();
        $eventoRepository = new EventoRepository();
        $albumRepository = new AlbumRepository();
        $journalRepository = new JournalRepository();
        $bannerRepository = new BannerRepository();
        $categoryNewRepository = new CategoryNewRepository();
        $table1Repository = new Table1Repository();
        $table2Repository = new Table2Repository();
        $table7Repository = new Table7Repository();
        $employeeRepository = new EmployeeRepository();
        $especialidadesRepository = new EspecialidadesRepository();
        $teamRepository = new TeamRepository();
        $mediaRepository = new MediaRepository();
        $comisionesTecnicasRepository = new ComisionesTecnicasRepository();
        $coleccionRepository = new ColeccionRepository();
        $resultadosRepository = new ResultadosRepository();

        $news = $newRepository->basicsearch($search);
        $rs = $RSRepository->search($search);
        $sponsors = $sponsorRepository->search($search);
        $rfeg_title = $rfegTitleRepository->search($search);
        $courses = $courseRepository->basicsearch($search);
        $normativas = $schoolRepository->basicsearch($search);
        $events = $eventoRepository->basicsearch($search);
        $albums = $albumRepository->search($search);
        $journals = $journalRepository->search($search);
        $banners = $bannerRepository->basicsearch($search);
        $categories = $categoryNewRepository->search($search);
        $table1 = $table1Repository->search($search);
        $table2 = $table2Repository->search($search);
        $table7 = $table7Repository->search($search);
        $employees = $employeeRepository->search($search);
        $especialidades = $especialidadesRepository->search($search);
        $page = $pageRepository->search($search);
        $general = $generalRepository->search($search);
        $teams = $teamRepository->search($search);
        $medias = $mediaRepository->search($search);
        $comisionesTecnicas = $comisionesTecnicasRepository->search($search);
        $colecciones = $coleccionRepository->search($search);
        $resultados = $resultadosRepository->search($search);
        $resultadosFiles = $resultadosRepository->searchFile($search);

        $data = [
            'news' => $news,
            'headers' => $headers,
            'rs' => $rs,
            'sponsors' => $sponsors,
            'courses' => $courses,
            'normativas' => $normativas,
            'rfeg_title' => $rfeg_title,
            'events' => $events,
            'albums' => $albums,
            'journals' => $journals,
            'banners' => $banners,
            'categories' => $categories,
            'tags' => $tags,
            'albumNews' => $albumNews,
            'table1' => $table1,
            'table2' => $table2,
            'table7' => $table7,
            'rfeg_title' => $rfeg_title,
            'employees' => $employees,
            'especialidades' => $especialidades,
            'schools' => $schools,
            'courses' => $courses,
        ];

        return json_encode($data);
    }
}