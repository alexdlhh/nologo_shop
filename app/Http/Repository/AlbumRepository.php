<?php

namespace App\Http\Repository;

use App\Http\Entity\AlbumEntity;
use App\Http\Mapper\AlbumMapper;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AlbumRepository
{
    /**
     * @param array $data
     * @return array
     */
    public function getAll($page=1, $search = '')
    {
        $albumMapper = new AlbumMapper();
        $albumList = [];

        $page = ($page-1)*10;
        if(!empty($search)) {
            $album = DB::table('album')
                ->where('name', 'like', '%'.$search.'%')
                ->orderBy('name', 'desc')
                ->skip($page)->take(10)->get();
        } else {
            $album = DB::table('album')
                ->orderBy('name', 'desc')
                ->skip($page)->take(10)->get();
        }
        if(!empty($album->toArray())) {
            $albumList = $albumMapper->mapCollection($album->toArray());
        }
        return $albumList;
    }
    
    /**
     * @param array $filter
     * @return AlbumEntity
     */
    public function getOne($id){
        $albumMapper = new AlbumMapper();
        $album = DB::table('album')
            ->where('id', $id)
            ->first();
        $album = $albumMapper->map(get_object_vars($album));
        return $album;
    }

    /**
     * getById
     * @param int $id
     * @return array
     */
    public function getById(int $id){
        $albumMapper = new AlbumMapper();
        $album = DB::table('album')
            ->where('id', $id)
            ->first();
        $album = $albumMapper->map(get_object_vars($album));
        return $album;
    }
    
    /**
     * @param array $data
     * @return int
     */
    public function create(Request $request){
        $albumMapper = new AlbumMapper();
        $data = $request->all();
        $album = $albumMapper->map($data);
        $id = DB::table('album')
            ->insertGetId([
                'name' => $album->getName(),
                'created_at' => !empty($album->getCreatedAt()) ? $album->getCreatedAt() : date('Y-m-d H:i:s'),
                'updated_at' => !empty($album->getUpdatedAt()) ? $album->getUpdatedAt() : date('Y-m-d H:i:s'),
        ]);
        return $id;
    }

    /**
     * @param array $data
     * @return int
     */
    public function update(Request $request, $id){
        $albumMapper = new AlbumMapper();
        $data = $request->all();
        $album = $albumMapper->map($data);
        $id = DB::table('album')
            ->where('id', $id)
            ->update([
                'name' => $album->getName(),
                'created_at' => !empty($album->getCreatedAt()) ? $album->getCreatedAt() : date('Y-m-d H:i:s'),
                'updated_at' => !empty($album->getUpdatedAt()) ? $album->getUpdatedAt() : date('Y-m-d H:i:s'),
            ]);
        return $id;
    }

    /**
     * @param array $data
     * @return int
     */
    public function delete($id){
        $id = DB::table('album')
            ->where('id', $id)
            ->delete();
        return $id;
    }

    /**
     * @param array $data
     * @return int
     */
    public function getTotal($search = ''){
        if(!empty($search)) {
            $count = DB::table('album')
                ->where('name', 'like', '%'.$search.'%')
                ->count();
        } else {
            $count = DB::table('album')
                ->count();
        }
        return $count;
    }

    /**
     * Buscamos en todos los campos de album
     * @param string $search
     * @return array
     */
    public function search($search){
        $albumMapper = new AlbumMapper();
        $albumList = [];
        $album = DB::table('album')
            ->where('name', 'like', '%'.$search.'%')
            ->orderBy('name', 'desc')
            ->get();
        if(!empty($album->toArray())) {
            $albumList = $albumMapper->mapCollection($album->toArray());
        }
        return $albumList;
    }
}