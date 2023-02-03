<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repository\ColeccionRepository;
use App\Http\Repository\PagesRepository;
use App\Http\Repository\MediaRepository;

class ColeccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function colecciones($page=1,$search='')
    {
        $coleccionRepository = new ColeccionRepository();
        $coleccion=$coleccionRepository->getAll($page,$search);
        $mediaRepository = new MediaRepository();
        $media=$mediaRepository->getAll();
        $media_var = [];
        foreach ($coleccion as $key => $value) {
            $media_var[$value->id]=$mediaRepository->getByColection($value->id);
        }
        return view('admin.coleccion.list')->with('admin',[
            'title' => 'Listado de Colecciones',
            'colecciones' => $coleccion,
            'media_var' => $media_var,
            'section' => 'media',
            'subsection' => 'listmedia'
        ]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return int $id
     */
    public function postCreate(Request $request)
    {
        $coleccionRepository = new ColeccionRepository();
        if($request->id == 0){
            $id = $coleccionRepository->create($request);
        } else {
            $id = $coleccionRepository->update($request);
        }
        
        return $id;
    }

    /**
     * Delete a newly created resource in storage.
     */
    public function postDelete($id)
    {
        $coleccionRepository = new ColeccionRepository();
        echo $coleccionRepository->delete($id);
    }

    /**
     * Mostramos el formulario de creación de colecciones
     */
    public function create(){
        $coleccionRepository = new ColeccionRepository();
        $coleccion=$coleccionRepository->getAll();
        return view('admin.coleccion.create')->with('admin',[
            'title' => 'Crear Coleccion',
            'coleccion' => $coleccion,
            'section' => 'media',
            'subsection' => 'savemedia'
        ]);
    }

    /**
     * Mostramos el formulario de edición de colecciones
     */
    public function edit($id){
        $coleccionRepository = new ColeccionRepository();
        $coleccion=$coleccionRepository->getById($id);
        $subalbums = $coleccionRepository->getSubalbums($id);
        return view('admin.coleccion.edit')->with('admin',[
            'title' => 'Editar Coleccion',
            'coleccion' => $coleccion,
            'subalbums' => $subalbums,
            'section' => 'media',
            'subsection' => 'savecolection'
        ]);
    }

    /**
     * 
     */
    public function createSubAlbum(Request $request){
        //hay un campo imagen en request que debemos subir
        $ruta_imagen = '';
        if($request->hasFile('imagen')){
            $image = $request->file('imagen');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/subalbum');
            $image->move($destinationPath, $name);
            $type = 'image';
            $ruta_imagen = '/images/subalbum/'.$name;
        }
        $coleccionRepository = new ColeccionRepository();
        $coleccionRepository->createSubAlbum($request->input('album'),$request->input('title'),$ruta_imagen);
        return true;
    }

    /**
     * 
     */
    public function deleteSubAlbum($id){
        $coleccionRepository = new ColeccionRepository();
        $coleccionRepository->deleteSubAlbum($id);
        return true;
    }

    /**
     * 
     */
    public function editSubAlbum(Request $request){
        $ruta_imagen = '';
        if($request->hasFile('imagen')){
            $image = $request->file('imagen');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/subalbum');
            $image->move($destinationPath, $name);
            $type = 'image';
            $ruta_imagen = '/images/subalbum/'.$name;
        }
        $coleccionRepository = new ColeccionRepository();
        $coleccionRepository->updateSubalbum($request->input('id'),$request->input('album'),$request->input('title'),$ruta_imagen);
        return true;
    }
}