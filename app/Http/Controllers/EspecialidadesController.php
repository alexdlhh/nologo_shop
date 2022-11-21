<?php
namespace App\Http\Controllers;

use App\Http\Mapper\EspecialidadesMapper;
use App\Http\Repository\EspecialidadesRepository;
use App\Http\Repository\TeamRepository;
use Illuminate\Http\Request;
use App\Http\Repository\NewsRepository;
use App\Http\Repository\RSRepository;
use App\Http\Repository\SponsorRepository;
use App\Http\Repository\PagesRepository;
//use App\Http\Helpers\Common;

class EspecialidadesController extends Controller
{
    /**
     * @var EspecialidadesRepository
     */
    private $especialidadesRepository;

    /**
     * @var TeamRepository
     */
    private $teamRepository;

    /**
     * EspecialidadesController constructor.
     * @param EspecialidadesRepository $especialidadesRepository
     */
    public function __construct(EspecialidadesRepository $especialidadesRepository, TeamRepository $teamRepository)
    {
        $this->especialidadesRepository = $especialidadesRepository;
        $this->teamRepository = $teamRepository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAll()
    {
        $especialidades = $this->especialidadesRepository->getAll();
        return view('admin.especialidades.list', 
        ['admin'=>[
            'title'=>'Especialidades',
            'especialidades'=>$especialidades,
            'section' => 'rfeg',
            'subsection' => 'listespecialidades'
        ]]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getOne($id)
    {
        $especialidades = $this->especialidadesRepository->getOne($id);
        $team = $this->teamRepository->getByEspecialityAngYear($especialidades->getId(),$especialidades->getCurrentSeason());
        return view('admin.especialidades.edit', 
        ['admin'=>[
            'title'=>$especialidades->getName(),
            'especialidades'=>$especialidades,
            'section' => 'rfeg',
            'team' => $team,
            'subsection' => 'listespecialidades'
        ]]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        $id = $this->especialidadesRepository->update($request);
        return response()->json(['id' => $id]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function postEditGeneral(Request $request){
        $id = $this->especialidadesRepository->postEditGeneral($request);
        return response()->json(['id' => $id]);
    }

    /**
     * Nos llega la id de la especialidad, junto con un array de jugadores y sus nuevas posiciones
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function postReorder(Request $request){
        $id = $this->especialidadesRepository->postReorder($request);
        return response()->json(['id' => $id]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function postTeamNew(Request $request){
        $image="";
        if($request->hasFile('image')){
            $image = $request->file('image');
            //upload image
            $image = $image->store('public/especialidades/team');
            $image = str_replace("public/","",$image);
        }
        $id = $this->teamRepository->postTeamNew($request,$image);
        return response()->json(['id' => $id]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function postTeamEdit(Request $request){
        $id = $this->teamRepository->postTeamEdit($request);
        return response()->json(['id' => $id]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function postTeamDelete(Request $request){
        $id = $this->teamRepository->postTeamDelete($request);
        return response()->json(['id' => $id]);
    }

    /**
     * Vista de la front Page
     */
    public function frontPage($menu1='ritmica', $menu2='equipos'){
        //$common = new Common();
        $pageRepository = new PagesRepository();
        $newRepository = new NewsRepository();
        $RSRepository = new RSRepository();
        $sponsorRepository = new SponsorRepository();
        $news = $newRepository->getNews(5);
        $headers = $this->header_order($pageRepository->getAll('section','=','1'));
        $rs = $RSRepository->getAll();
        $sponsors = $sponsorRepository->getAll();
        $especialidades = $this->especialidadesRepository->getAll();

        $front = [
            'headers' => $headers,
            'section' => '/especialities',
            'news' => $news,
            'rs' => $rs,
            'sponsors' => $sponsors,
            'subsection' => 'especialidades',
            'title'=>'Especialidades',
            'menu1' => $menu1,
            'menu2' => $menu2,
        ];
        return view('pages.especialidades')->with('front',$front);
    }
    public function header_order($headers){
        $order = [];
        $aux = [];
        foreach($headers as $_link){
            $order[$_link->getOrder()] = $_link;
        }
        for($i = 1; $i <= count($order); $i++){
            $aux[] = $order[$i];
        }
        return $aux;
    }
}