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
use App\Http\Repository\ColeccionRepository;
use App\Http\Repository\MediaRepository;
use App\Http\Repository\EventoRepository;
use App\Http\Repository\RFEGTitleRepository;
use App\Http\Repository\Table1Repository;
use App\Http\Repository\ComisionesTecnicasRepository;
use App\Http\Repository\ResultadosRepository;
use App\Http\Repository\ResultadosFileRepository;
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
            'section' => 'especialidades',
            'subsection' => 'listespecialidades'
        ]]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getOne($id)
    {
        $comisionesTecnicasRepository = new ComisionesTecnicasRepository();
        $resultadosRepository = new ResultadosRepository();
        $resultadosFileRepository = new ResultadosFileRepository();
        $resultados = $resultadosRepository->getByEspecialidad($id);
        $especialidades = $this->especialidadesRepository->getOne($id);
        $team = $this->teamRepository->getByEspecialityAngYear($especialidades->getId(),$especialidades->getCurrentSeason());
        $comisiones_tecnicas = $comisionesTecnicasRepository->getByEspecialidad($id);
        return view('admin.especialidades.edit', 
        ['admin'=>[
            'title'=>$especialidades->getName(),
            'especialidades'=>$especialidades,
            'section' => 'especialidades',
            'team' => $team,
            'subsection' => 'listespecialidades',
            'especialidad' => $especialidades->getId(),
            'comisiones_tecnicas' => $comisiones_tecnicas,
            'resultados' => $resultados,
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
        $image_url="";
        if($request->hasFile('image')){
            $image = $request->file('image');
            //prepare image name with title without special characters and spaces
            $image_name = 'jugador_';
            $image_name = preg_replace('/[^A-Za-z0-9\-]/', '', $image_name);        
            $imageName = time().$image_name.'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/team');
            $image->move($destinationPath, $imageName);
            //change $request feature_image content to current location of image
            $image_url = '/images/team/'.$imageName;
        }
        $id = $this->teamRepository->postTeamNew($request,$image_url);
        return response()->json(['id' => $id]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function postTeamEdit(Request $request){
        $image_url="";
        if($request->hasFile('image')){
            $image = $request->file('image');
            //prepare image name with title without special characters and spaces
            $image_name = 'jugador_';
            $image_name = preg_replace('/[^A-Za-z0-9\-]/', '', $image_name);        
            $imageName = time().$image_name.'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/team');
            $image->move($destinationPath, $imageName);
            //change $request feature_image content to current location of image
            $image_url = '/images/team/'.$imageName;
        }
        $id = $this->teamRepository->postTeamEdit($request,$image_url);
        return response()->json(['id' => $id]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function postTeamDelete(Request $request){
        $id = $request->input('id');
        $id = $this->teamRepository->postTeamDelete($id);
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
        $coleccionRepository = new ColeccionRepository();
        $mediaRepository = new MediaRepository();
        $eventoRepository = new EventoRepository();
        $RFEGTitleRepository = new RFEGTitleRepository();
        $table1Repository = new Table1Repository();
        $eventos = $eventoRepository->getEventsByEspecialidadAlias($menu1);
        $especialidad = $this->especialidadesRepository->getIdBySlug($menu1);
        $news = $newRepository->getNewsByEspecialidad($especialidad);
        $headers = $this->header_order($pageRepository->getAll('section','=','1'));
        $rs = $RSRepository->getAll();
        $sponsors = $sponsorRepository->getAll();
        $especialidades = $this->especialidadesRepository->getAll();        
        $media = $mediaRepository->getMediaScroll(0,$especialidad);

        $content_tables = [];
        $rfeg_title='';
        $rfeg_title = $RFEGTitleRepository->getbyEspecialidad($especialidad);
        foreach($rfeg_title as $title){
            $content_tables[$title->getId()] = $table1Repository->getbyRfegTitleAndEspeciality($title->getId(),$especialidad);
        }      

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
            'media' => $media,
            'eventos' => $eventos,
            'rfeg_title' => $rfeg_title,
            'content_tables' => $content_tables,
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

    public function getNewsScrollEspecialidad($pag=2,$especialidad){
        $newRepository = new NewsRepository();
        if($pag<2){
            $pag = 2;
        }
        $pag = ($pag-1)*9;
        $especialidad = $this->especialidadesRepository->getIdBySlug($especialidad);
        $news = $newRepository->getNewsByEspecialidad($especialidad,$pag);
        return response()->json(['news' => $news]);
    }

    public function postReorderComisionesTecnicas(Request $request){
        $comisionesTecnicasRepository = new ComisionesTecnicasRepository();
        $id = $comisionesTecnicasRepository->postReorder($request);
        return response()->json(['id' => $id]);
    }

    public function postComisionesTecnicasSave(Request $request){
        $comisionesTecnicasRepository = new ComisionesTecnicasRepository();
        $image_url = '';
        if($request->hasFile('image')){
            $image = $request->file('image');
            //prepare image name with title without special characters and spaces
            $image_name = 'comisiones_tecnicas_';
            $image_name = preg_replace('/[^A-Za-z0-9\-]/', '', $image_name);        
            $imageName = time().$image_name.'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/comisiones_tecnicas');
            $image->move($destinationPath, $imageName);
            //change $request feature_image content to current location of image
            $image_url = '/images/comisiones_tecnicas/'.$imageName;
        }
        $id = $comisionesTecnicasRepository->postSave($request,$image_url);
        return response()->json(['id' => $id]);
    }

    public function postComisionesTecnicasEdit(Request $request){
        $comisionesTecnicasRepository = new ComisionesTecnicasRepository();
        $image_url = '';
        if($request->hasFile('image')){
            $image = $request->file('image');
            //prepare image name with title without special characters and spaces
            $image_name = 'comisiones_tecnicas_';
            $image_name = preg_replace('/[^A-Za-z0-9\-]/', '', $image_name);        
            $imageName = time().$image_name.'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/comisiones_tecnicas');
            $image->move($destinationPath, $imageName);
            //change $request feature_image content to current location of image
            $image_url = '/images/comisiones_tecnicas/'.$imageName;
        }
        $id = $comisionesTecnicasRepository->postEdit($request,$image_url);
        return response()->json(['id' => $id]);
    }

    public function postComisionesTecnicasDelete(Request $request){
        $id = $request->input('id');
        $comisionesTecnicasRepository = new ComisionesTecnicasRepository();
        $id = $comisionesTecnicasRepository->postDelete($id);
        return response()->json(['id' => $id]);
    }

    public function resultadoSave(Request $request){
        $resultadoRepository = new ResultadosRepository();
        $id = $resultadoRepository->postSave($request);
        return response()->json(['id' => $id]);
    }

    public function resultadoFileSave(Request $request){
        $resultadoRepository = new ResultadosRepository();
        $archivo_url = '';
        if($request->hasFile('documento')){
            $file = $request->file('documento');
            //prepare image name with title without special characters and spaces
            $file_name = 'resultado_';
            $file_name = preg_replace('/[^A-Za-z0-9\-]/', '', $file_name);        
            $fileName = time().$file_name.'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('/files/resultados');
            $file->move($destinationPath, $fileName);
            //change $request feature_image content to current location of image
            $request->merge(['file' => '/files/resultados/'.$fileName]);
            $archivo_url = '/files/resultados/'.$fileName;
        }
        $id = $resultadoRepository->postFileSave($request,$archivo_url);
        return response()->json(['id' => $id]);
    }

    public function postEditDocument(Request $request){
        $resultadoRepository = new ResultadosRepository();
        $archivo_url = '';
        if($request->hasFile('documento')){
            $file = $request->file('documento');
            //prepare image name with title without special characters and spaces
            $file_name = 'resultado_';
            $file_name = preg_replace('/[^A-Za-z0-9\-]/', '', $file_name);        
            $fileName = time().$file_name.'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('/files/resultados');
            $file->move($destinationPath, $fileName);
            //change $request feature_image content to current location of image
            $request->merge(['file' => '/files/resultados/'.$fileName]);
            $archivo_url = '/files/resultados/'.$fileName;
        }
        $id = $resultadoRepository->postFileSave($request,$archivo_url);
        return response()->json(['id' => $id]);
    }

    public function resultadoDelete($id){
        $resultadoRepository = new ResultadosRepository();
        $id = $resultadoRepository->postDelete($id);
        return response()->json(['id' => $id]);
    }

    public function resultadoFileDelete($id){
        $resultadoRepository = new ResultadosRepository();
        $id = $resultadoRepository->postFileDelete($id);
        return response()->json(['id' => $id]);
    }
}