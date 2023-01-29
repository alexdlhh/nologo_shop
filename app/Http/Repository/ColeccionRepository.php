<?php

namespace App\Http\Repository;

use App\Http\Entity\ColeccionEntity;
use App\Http\Mapper\ColeccionMapper;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ColeccionRepository
{
    /**
     * @param array $data
     * @return array
     */
    public function getAll($page=1, $search="")
    {
        $coleccionMapper = new ColeccionMapper();
        $coleccionList = [];
        $page = ($page-1)*10;
        if(!empty($search)) {
            $coleccion = DB::table('coleccion')
                ->where('name', 'like', '%'.$search.'%')
                ->orderBy('name', 'desc')
                ->skip($page)->take(10)->get();
        } else {
            $coleccion = DB::table('coleccion')
                ->orderBy('name', 'desc')
                ->skip($page)->take(10)->get();
        }
        if(!empty($coleccion->toArray())) {
            $coleccionList = $coleccionMapper->mapCollection($coleccion->toArray());
        }
        return $coleccionList;
    }
    
    /**
     * @param array $filter
     * @return ColeccionEntity
     */
    public function getOne($filter = []){
        $coleccionMapper = new ColeccionMapper();
        $coleccion = DB::table('coleccion')
            ->where($filter)
            ->first();
        $coleccion = $coleccionMapper->map(get_object_vars($coleccion));
        return $coleccion;
    }

    /**
     * obtener por id
     * @param $id
     * @return ColeccionEntity
     */
    public function getById($id){
        $coleccionMapper = new ColeccionMapper();
        $coleccion = DB::table('coleccion')
            ->where('id', $id)
            ->first();
        $coleccion = $coleccionMapper->map(get_object_vars($coleccion));
        return $coleccion;
    }
    
    /**
     * @param array $data
     * @return int
     */
    public function create(Request $request){
        $coleccionMapper = new ColeccionMapper();
        $data = $request->all();
        $coleccion = $coleccionMapper->map($data);
        $id = DB::table('coleccion')
            ->insertGetId(
                [
                    'name' => $coleccion->getName(),
                    'create_at' => !empty($coleccion->getCreatedAt())?$coleccion->getCreatedAt():date('Y-m-d H:i:s'),
                    'update_at' => !empty($coleccion->getUpdatedAt())?$coleccion->getUpdatedAt():date('Y-m-d H:i:s'),
                ]
            );
        return $id;
    }
    
    /**
     * @param array $data
     * @return int
     */
    public function update(Request $request){
        $coleccionMapper = new ColeccionMapper();
        $data = $request->all();
        $coleccion = $coleccionMapper->map($data);
        $id = DB::table('coleccion')
            ->where('id', $coleccion->id)
            ->update(
                [
                    'name' => $coleccion->getName(),
                    'update_at' => !empty($coleccion->getUpdatedAt())?$coleccion->getUpdatedAt():date('Y-m-d H:i:s'),
                ]
            );
        return $id;
    }

    /**
     * @param array $data
     * @return int
     */
    public function getIdBySlug($slug){
        $coleccionMapper = new ColeccionMapper();
        $coleccion = DB::table('coleccion')
            ->where('name', $slug)
            ->first();
        if(empty($coleccion)) {
            return 0;
        }
        $coleccion = $coleccionMapper->map(get_object_vars($coleccion));
        return $coleccion->getId();
    }
    
    /**
     * @param array $data
     * @return int
     */
    public function delete($id){
        return DB::table('coleccion')
            ->where('id', $id)
            ->delete();
    }

    /**
     * Buscamos en todos los campos de coleccion
     * @param $search
     * @return array
     */
    public function search($search){
        $coleccionMapper = new ColeccionMapper();
        $coleccionList = [];
        $coleccion = DB::table('coleccion')
            ->where('name', 'like', '%'.$search.'%')
            ->orderBy('name', 'desc')
            ->get();
        if(!empty($coleccion->toArray())) {
            $coleccionList = $coleccionMapper->mapCollection($coleccion->toArray());
        }
        return $coleccionList;
    }

    /**
     * Creamos subalbum
     * 
     * @param $data
     * @return bool
     */
    public function createSubalbum($album, $titulo, $imagen){
        DB::table('subalbum')
            ->insert(
                [
                    'album' => $album,
                    'title' => $titulo,
                    'imagen' => $imagen,
                ]
            );
    }

    /**
     * Actualizamos subalbum
     * 
     * @param $data
     * @return bool
     */
    public function updateSubalbum($id, $album, $titulo, $imagen){
        if(!empty($imagen)) {
            DB::table('subalbum')
                ->where('id', $id)
                ->update(
                    [
                        'titulo' => $titulo,
                        'imagen' => $imagen,
                    ]
                );
        } else {
            DB::table('subalbum')
                ->where('id', $id)
                ->update(
                    [
                        'titulo' => $titulo,
                    ]
                );
        }
    }

    /**
     * Eliminamos subalbum
     * 
     * @param $data
     * @return bool
     */
    public function deleteSubalbum($id){
        DB::table('subalbum')
            ->where('id', $id)
            ->delete();
    }

    /**
     * obtenemos subalbums a partir del album
     * 
     */
    public function getSubalbums($album){
        $subalbum = DB::table('subalbum')
            ->where('album', $album)
            ->orderBy('id', 'desc')
            ->get();
        
        return $subalbum;
    }
}