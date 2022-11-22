<?php

namespace App\Http\Repository;

use App\Http\Entity\MediaEntity;
use App\Http\Mapper\MediaMapper;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MediaRepository
{

    /**
     * @param array $data
     * @return array
     */
    public function getAll($coleccion=0)
    {
        $mediaMapper = new MediaMapper();
    
        if(!empty($coleccion)){
            $media = DB::table('media')
                ->where('coleccion', $coleccion)
                ->get();
        } else {
            $media = DB::table('media')->get();
        }
        $mediaList = $mediaMapper->mapCollection($media);
        return $mediaList;
    }
    
    /**
     * @param array $filter
     * @return MediaEntity
     */
    public function getOne($filter = []){
        $mediaMapper = new MediaMapper();
        $media = DB::table('media')
            ->where($filter)
            ->first();
        $media = $mediaMapper->map($media);
        return $media;
    }

    /**
     * getbyid
     * @param $id
     * @return MediaEntity
     */
    public function getById($id){
        $mediaMapper = new MediaMapper();
        $media = DB::table('media')
            ->where('id', $id)
            ->first();
        $media = $mediaMapper->map(get_object_vars($media));
        return $media;
    }

    /**
     * get by collection id its relating to media, one collection can have many media
     * @param $id
     * @return array
     */
    public function getByColection($id){
        $mediaMapper = new MediaMapper();
        $media = DB::table('media')
            ->where('coleccion', $id)
            ->get();
        $mediaList = $mediaMapper->mapCollection($media);
        return $mediaList;
    }

    /**
     * Obtener por colección y especialidad
     * @param $coleccion
     * @param $especialidad
     * @return array
     */
    public function getByColectionAndSpeciality($coleccion, $especialidad){
        $mediaMapper = new MediaMapper();
        if($coleccion=='all' && $especialidad=='all'){
            $media = DB::table('media')->get();
        } else if($coleccion=='all' && $especialidad!='all'){
            $media = DB::table('media')
                ->where('especialidad', $especialidad)
                ->get();
        } else if($coleccion!='all' && $especialidad=='all'){
            $media = DB::table('media')
                ->where('coleccion', $coleccion)
                ->get();
        } else {
            $media = DB::table('media')
                ->where('coleccion', $coleccion)
                ->where('especialidad', $especialidad)
                ->get();
        }
        $mediaList = $mediaMapper->mapCollection($media->toArray());
        return $mediaList;
    }
    
    /**
     * @param array $data
     * @return bool
     */
    public function create(Request $request,$url,$type){
        $mediaMapper = new MediaMapper();
        $media = $mediaMapper->map($request->all());
        $id = DB::table('media')->insertGetId([
            'title' => $media->getTitle(), 
            'description' => $media->getDescription(),
            'type' => $type,
            'created_at' => !empty($media->getCreatedAt()) ? $media->getCreatedAt() : date('Y-m-d H:i:s'),
            'updated_at' => !empty($media->getUpdatedAt()) ? $media->getUpdatedAt() : date('Y-m-d H:i:s'),
            'url' => $url,
            'coleccion' => $media->getColeccion(),
            'especialidad' => $media->getEspecialidad(),
            ]);
        return $id;
    }
    
    /**
     * @param array $data
     */
    public function update(Request $request,$url,$type){
        $mediaMapper = new MediaMapper();
        $media = $mediaMapper->map($request->all());
        if($type=='image'){
            DB::table('media')
                ->where('id', $media->getId())
                ->update([
                    'title' => $media->getTitle(), 
                    'description' => $media->getDescription(),
                    'type' => $type,
                    'updated_at' => !empty($media->getUpdatedAt()) ? $media->getUpdatedAt() : date('Y-m-d H:i:s'),
                    'url' => $url,
                    'coleccion' => $media->getColeccion(),
                    'especialidad' => $media->getEspecialidad(),
                ]);
        } elseif($type=='video'){
            DB::table('media')
                ->where('id', $media->getId())
                ->update([
                    'title' => $media->getTitle(), 
                    'description' => $media->getDescription(),
                    'type' => $type,
                    'updated_at' => !empty($media->getUpdatedAt()) ? $media->getUpdatedAt() : date('Y-m-d H:i:s'),
                    'url' => $url,
                    'coleccion' => $media->getColeccion(),
                    'especialidad' => $media->getEspecialidad(),
                ]);
        } else {
            DB::table('media')
                ->where('id', $media->getId())
                ->update([
                    'title' => $media->getTitle(), 
                    'description' => $media->getDescription(),
                    'updated_at' => !empty($media->getUpdatedAt()) ? $media->getUpdatedAt() : date('Y-m-d H:i:s'),
                    'coleccion' => $media->getColeccion(),
                    'especialidad' => $media->getEspecialidad(),
                ]);
        }
    }

    /**
     * @param array $data
     */
    public function delete($id){
        $mediaMapper = new MediaMapper();
        DB::table('media')->where('id', '=', $id)->delete();
    }
}