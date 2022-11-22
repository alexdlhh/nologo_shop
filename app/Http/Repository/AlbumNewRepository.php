<?php

namespace App\Http\Repository;

use App\Http\Entity\AlbumNewEntity;
use App\Http\Mapper\AlbumNewMapper;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AlbumNewRepository
{
    /**
     * @param array $data
     * @return array
     */
    public function getAllByIdNew($id_new)
    {
        $albumNewMapper = new AlbumNewMapper();
        $albumNewList = [];
        
        $albumNew = DB::table('album_new')
            ->where('id_new', $id_new)
            ->get();
        if(!empty($albumNew->toArray())) {
            $albumNewList = $albumNewMapper->mapCollection($albumNew->toArray());
        }

        return $albumNewList;
    }
    

    /**
     * @param array $data
     * @return int $id
     */
    public function create($id,$url){
        $albumNewMapper = new AlbumNewMapper();
        $id = DB::table('album_new')->insertGetId([
            'id_new' => $id,
            'url' => $url,
        ]);
        return $id;
    }

    /**
     * @param int $id
     * @return int $id
     */
    public function delete($id){
        $id = DB::table('album_new')
            ->where('id', $id)
            ->delete();
        return $id;
    }
}