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
            $tagNew = $tagNewMapper->mapCollection($tagNew->toArray());
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
        $tagNew->save();
        return $tagNew->id;
    }
}