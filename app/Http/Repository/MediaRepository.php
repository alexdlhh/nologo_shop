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
     * @param array $data
     * @return bool
     */
    public function create(Request $request){
        $mediaMapper = new MediaMapper();
        $media = $mediaMapper->map($request->all());
        $media->save();
        return true;
    }
    
    /**
     * @param array $data
     */
    public function update(Request $request, $filter = []){
        $mediaMapper = new MediaMapper();
        $media = $mediaMapper->map($request->all());
        DB::table('media')
            ->where($filter)
            ->update($media->toArray());
    }

    /**
     * @param array $data
     */
    public function delete(Request $request, $filter = []){
        $mediaMapper = new MediaMapper();
        $media = $mediaMapper->map($request->all());
        DB::table('media')
            ->where($filter)
            ->delete();
    }
}