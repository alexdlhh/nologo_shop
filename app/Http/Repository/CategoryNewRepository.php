<?php

namespace App\Http\Repository;

use App\Http\Entity\CategoryNewEntity;
use App\Http\Mapper\CategoryNewMapper;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CategoryNewRepository
{
    /**
     * @param array $data
     * @return array
     */
    public function getAll($filter = [])
    {
        $categoryNewMapper = new CategoryNewMapper();
        $categoryNewList = [];
        if(!empty($filter)) {
            $categoryNew = DB::table('category_new')
                ->where($filter)
                ->get();
        } else {
            $categoryNew = DB::table('category_new')
                ->get();
        }
        if(!empty($categoryNew->toArray())) {
            $categoryNewList = $categoryNewMapper->mapCollection($categoryNew->toArray());
        }
        return $categoryNewList;
    }
    
    /**
     * @param array $filter
     * @return CategoryNewEntity
     */
    public function getOne($filter = []){
        $categoryNewMapper = new CategoryNewMapper();
        $categoryNew = DB::table('category_new')
            ->where($filter)
            ->first();
        $categoryNew = $categoryNewMapper->map($categoryNew);
        return $categoryNew;
    }
    
    /**
     * @param array $data
     * @return int
     */
    public function create(Request $request){
        $categoryNewMapper = new CategoryNewMapper();
        $data = $request->all();
        $categoryNew = $categoryNewMapper->map($data);
        $id = DB::table('category_new')
            ->insertGetId($categoryNew->toArray());
        return $categoryNew->id;
    }

    /**
     * @param array $data
     * @return int
     */
    public function update(Request $request){
        $categoryNewMapper = new CategoryNewMapper();
        $data = $request->all();
        $categoryNew = $categoryNewMapper->map($data);
        $id = DB::table('category_new')
            ->where('id', $categoryNew->id)
            ->update($categoryNew->toArray());
        return $categoryNew->id;
    }

    /**
     * @param array $data
     * @return int
     */
    public function delete(Request $request){
        $categoryNewMapper = new CategoryNewMapper();
        $data = $request->all();
        $categoryNew = $categoryNewMapper->map($data);
        $id = DB::table('category_new')
            ->where('id', $categoryNew->id)
            ->delete();
        return $categoryNew->id;
    }
}