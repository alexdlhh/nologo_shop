<?php

namespace App\Http\Repository;

use App\Http\Entity\TagNewEntity;
use App\Http\Mapper\TagNewMapper;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TagNewRepository
{

    /**
     * @param array $data
     * @return array
     */
    public function getAll($filter = [])
    {
        $tagNewMapper = new TagNewMapper();
        $tagNewList = [];
        if(!empty($filter)) {
            $tagNew = DB::table('tag_new')
                ->where($filter)
                ->get();
        } else {
            $tagNew = DB::table('tag_new')
                ->get();
        }
        if(!empty($tagNew->toArray())) {
            $tagNewList = $tagNewMapper->mapCollection($tagNew->toArray());
        }
        return $tagNewList;
    }
    
    /**
     * @param array $filter
     * @return TagNewEntity
     */
    public function getOne($filter = []){
        $tagNewMapper = new TagNewMapper();
        $tagNew = DB::table('tag_new')
            ->where($filter)
            ->first();
        $tagNew = $tagNewMapper->map($tagNew);
        return $tagNew;
    }
    
    /**
     * @param array $data
     * @return int
     */
    public function create(Request $request){
        $tagNewMapper = new TagNewMapper();
        $data = $request->all();
        $tagNew = $tagNewMapper->map($data);
        //save to database
        $id = DB::table('tag_new')
            ->insertGetId([
                'name' => $tagNew->getName(),
            ]);
        return $id;
    }

    /**
     * @param array $data
     * @return int
     */
    public function update(Request $request){
        $tagNewMapper = new TagNewMapper();
        $data = $request->all();
        $tagNew = $tagNewMapper->map($data);
        //actualizar en la base de datos
        $id = DB::table('tag_new')
            ->where('id', $tagNew->getId())
            ->update([
                'name' => $tagNew->getName(),
            ]);
        return $tagNew->id;
    }

    /**
     * @param array $data
     * @return int
     */
    public function delete(Request $request){
        $tagNewMapper = new TagNewMapper();
        $data = $request->all();
        $tagNew = $tagNewMapper->map($data);
        //eliminar en la base de datos
        $id = DB::table('tag_new')
            ->where('id', $tagNew->getId())
            ->delete();
        return $tagNew->id;
    }
}