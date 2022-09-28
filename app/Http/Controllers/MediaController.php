<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repository\ColeccionRepository;
use App\Http\Repository\PagesRepository;
use App\Http\Repository\MediaRepository;

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
        $colecciones=$coleccionRepository->getAll();
        return view('admin.media.list')->with('admin',[
            'title' => 'Listado de Media',
            'media' => $media,
            'colecciones' => $colecciones,
            'coleccion' => $coleccion,
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
        if(!empty($request->file('image'))){
            //upload image
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/colecciones');
            $image->move($destinationPath, $name);
            $type = 'image';
            $url = '/images/colecciones/'.$name;
        } else {
            //save video url
            $type = 'video';
            $url = $request->video;
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
        return view('admin.media.create')->with('admin',[
            'title' => 'Subir Media',
            'colecciones' => $colecciones,
            'coleccion' => $coleccion,
            'section' => 'media',
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
        return view('admin.media.edit')->with('admin',[
            'title' => 'Editar Media',
            'media' => $media,
            'colecciones' => $colecciones,
            'section' => 'media',
            'subsection' => 'savemedia'
        ]);
    }
}