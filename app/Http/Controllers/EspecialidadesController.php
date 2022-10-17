<?php
namespace App\Http\Controllers;

use App\Http\Mapper\EspecialidadesMapper;
use App\Http\Repository\EspecialidadesRepository;
use App\Http\Repository\TeamRepository;
use Illuminate\Http\Request;

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

}