<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repository\ColeccionRepository;
use App\Http\Repository\PagesRepository;
use App\Http\Repository\MediaRepository;
use App\Http\Repository\NewsRepository;
use App\Http\Repository\RSRepository;
use App\Http\Repository\SponsorRepository;
use App\Http\Repository\EspecialidadesRepository;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function media($coleccion = 0, $search = '')
    {
        $mediaRepository = new MediaRepository();
        $media=$mediaRepository->getAll($coleccion, $search);
        $coleccionRepository = new ColeccionRepository();
        $especialidadesRepository = new EspecialidadesRepository();
        $especialidades = $especialidadesRepository->getAll();
        $colecciones=$coleccionRepository->getAll();
        return view('admin.media.list')->with('admin',[
            'title' => 'Listado de Media',
            'media' => $media,
            'colecciones' => $colecciones,
            'coleccion' => $coleccion,
            'especialidades' => $especialidades,
            'section' => 'media',
            'subsection' => 'listmedia'
        ]);
    }
    
    /**
     * Store a newly created resource in storage.
     * 
     * it can upload a image or a video if the image is empty it will upload a video and type will be video in other case it will be image
     *
     * @param  \Illuminate\Http\Request  $request
     * @return int $id
     */
    public function postCreate(Request $request)
    {
        $mediaRepository = new MediaRepository();
        $url = '';
        $type = '';
        if(!empty($request->file('image'))){
            //upload image
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/colecciones');
            $image->move($destinationPath, $name);
            $type = 'image';
            $url = '/images/colecciones/'.$name;
        } elseif($request->input('video') != 'https://www.youtube.com/embed/') {
            //save video url
            $type = 'video';
            $url = $request->input('video');
        }

        if($request->id == 0){
            $id = $mediaRepository->create($request,$url,$type);
        } else {
            $id = $mediaRepository->update($request,$url,$type);
        }
        
        return $id;
    }
    
    /**
     * Delete a newly created resource in storage.
     */
    public function postDelete(int $id)
    {
        $mediaRepository = new MediaRepository();
        $mediaRepository->delete($id);
        return true;
    }

    /**
     * Mostrar formulario para subir archivos
     */ 
    public function createMedia(int $coleccion=0)
    {
        $coleccionRepository = new ColeccionRepository();
        $colecciones=$coleccionRepository->getAll();
        $especialidadesRepository = new EspecialidadesRepository();
        $especialidades = $especialidadesRepository->getAll();
        return view('admin.media.create')->with('admin',[
            'title' => 'Subir Media',
            'colecciones' => $colecciones,
            'coleccion' => $coleccion,
            'section' => 'media',
            'especialidades' => $especialidades,
            'subsection' => 'savemedia'
        ]);
    }

    /**
     * Mostrar formulario para editar la informacion de los archivos subidos o sustituirlos
     */
    public function editMedia(int $id)
    {
        $mediaRepository = new MediaRepository();
        $media=$mediaRepository->getById($id);
        $coleccionRepository = new ColeccionRepository();
        $colecciones=$coleccionRepository->getAll();
        $especialidadesRepository = new EspecialidadesRepository();
        $especialidades = $especialidadesRepository->getAll();
        return view('admin.media.edit')->with('admin',[
            'title' => 'Editar Media',
            'media' => $media,
            'colecciones' => $colecciones,
            'section' => 'media',
            'especialidades' => $especialidades,
            'subsection' => 'savemedia'
        ]);
    }

    /**
     * Esta función obtendrá la siguiente tanda de noticias
     * @param $pag
     * @return \Illuminate\Http\JsonResponse
     */
    public function getMediaScroll($pag=2, $especialidad='todo'){
        $mediaRepository = new MediaRepository();
        $especialidadesRepository = new EspecialidadesRepository();
        if($pag<2){
            $pag = 2;
        }
        $pag = ($pag-1)*9;
        $especialidad = $especialidadesRepository->getIdBySlug($especialidad);
        $media = $mediaRepository->getMediaScroll($pag, $especialidad);
        return response()->json(['media' => $media]);
    }

    /**
     * Vista de la front Page
     */
    public function frontPageMultimedia($menu1='todo', $menu2='todo'){
        //$common = new Common();
        $pageRepository = new PagesRepository();
        $newRepository = new NewsRepository();
        $RSRepository = new RSRepository();
        $sponsorRepository = new SponsorRepository();
        $news = $newRepository->getNews(5);
        $headers = $this->header_order($pageRepository->getAll('section','=','1'));
        $coleccionRepository = new ColeccionRepository();
        $especialidadesRepository = new EspecialidadesRepository();
        $mediaRepository = new MediaRepository();
        if($menu1 == 'todo'){
            if($menu2 == 'todo'){
                $media = $mediaRepository->getByColectionAndSpecialityScroll('todo','todo');
            } else {
                $id_coleccion='all';
                $id_especialidad=$especialidadesRepository->getIdBySlug($menu2);
                $media = $mediaRepository->getByColectionAndSpecialityScroll($id_coleccion,$id_especialidad);
            }
        } else {
            if($menu2 == 'todo'){
                $id_coleccion=$coleccionRepository->getIdBySlug($menu1);
                $id_especialidad='all';
                $media = $mediaRepository->getByColectionAndSpecialityScroll($id_coleccion,$id_especialidad);
            } else {
                $id_coleccion=$coleccionRepository->getIdBySlug($menu1);
                $id_especialidad=$especialidadesRepository->getIdBySlug($menu2);
                $media = $mediaRepository->getByColectionAndSpecialityScroll($id_coleccion,$id_especialidad);
            }
        }

        $especialidades = $especialidadesRepository->getAll();
        $colecciones=$coleccionRepository->getAll();
        $rs = $RSRepository->getAll();
        $sponsors = $sponsorRepository->getAll();

        $front = [
            'headers' => $headers,
            'section' => '/media',
            'news' => $news,
            'rs' => $rs,
            'sponsors' => $sponsors,
            'subsection' => 'especialidades',
            'title'=>'Multimedia',
            'colecciones' => $colecciones,
            'especialidades' => $especialidades,
            'menu1' => $menu1,
            'menu2' => $menu2,
            'media' => $media
        ];
        return view('pages.media')->with('front',$front);
    }

    public function scrollComplete($pag=2,$menu1='todo', $menu2='todo'){
        $mediaRepository = new MediaRepository();
        $especialidadesRepository = new EspecialidadesRepository();
        $coleccionRepository = new ColeccionRepository();
        if($pag<2){
            $pag = 2;
        }
        $pag = ($pag-1)*9;
        if($menu2 == 'todo'){
            if($menu1 == 'todo'){
                $media = $mediaRepository->getByColectionAndSpecialityScroll('todo','todo',$pag);
            } else {
                $id_coleccion='all';
                $id_especialidad=$especialidadesRepository->getIdBySlug($menu1);
                $media = $mediaRepository->getByColectionAndSpecialityScroll($id_coleccion,$id_especialidad,$pag);
            }
        } else {
            if($menu2 == 'todo'){
                $id_coleccion=$coleccionRepository->getIdBySlug($menu2);
                $id_especialidad='all';
                $media = $mediaRepository->getByColectionAndSpecialityScroll($id_coleccion,$id_especialidad,$pag);
            } else {
                $id_coleccion=$coleccionRepository->getIdBySlug($menu2);
                $id_especialidad=$especialidadesRepository->getIdBySlug($menu1);
                $media = $mediaRepository->getByColectionAndSpecialityScroll($id_coleccion,$id_especialidad,$pag);
            }
        }
        return response()->json(['media' => $media]);
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