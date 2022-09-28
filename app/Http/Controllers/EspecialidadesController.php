<?php
namespace App\Http\Controllers;

use App\Http\Mapper\EspecialidadesMapper;
use App\Http\Repository\EspecialidadesRepository;
use Illuminate\Http\Request;

class EspecialidadesController extends Controller
{
    /**
     * @var EspecialidadesRepository
     */
    private $especialidadesRepository;

    /**
     * EspecialidadesController constructor.
     * @param EspecialidadesRepository $especialidadesRepository
     */
    public function __construct(EspecialidadesRepository $especialidadesRepository)
    {
        $this->especialidadesRepository = $especialidadesRepository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAll()
    {
        $page = $request->get('page');
        $search = $request->get('search');
        $especialidades = $this->especialidadesRepository->getAll();
        return view('admin.especialidades.list', ['admin'=>['title'=>'Albums','especialidades'=>$especialidades,'section' => 'rfeg','subsection' => 'listespecialidades']]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getOne(Request $request)
    {
        $id = $request->get('id');
        $especialidades = $this->especialidadesRepository->getOne(['id' => $id]);
        return response()->json($especialidades);
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

}