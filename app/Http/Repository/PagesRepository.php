<?php

namespace App\Http\Repository;

use App\Http\Entity\PagesEntity;
use App\Http\Mapper\PagesMapper;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PagesRepository
{

    /**
     * @param string $colum
     * @param string $condition
     * @param string $value
     * @return array
     */
    public function getAll($colum,$condition,$value)
    {
        $pagesMapper = new PagesMapper();
    
        if(!empty($colum) && !empty($condition) && !empty($value)) {
            $pages = DB::table('pages')
                ->where($colum,$condition,$value)
                ->get();
        } else {
            $pages = DB::table('pages')
                ->get();
        }
        
        $pagesList = $pagesMapper->mapCollection($pages);
        return $pagesList;
    }
    
    /**
     * @param array $filter
     * @return PagesEntity
     */
    public function getOne($filter = []){
        $pagesMapper = new PagesMapper();
        $pages = DB::table('pages')
            ->where($filter)
            ->first();
        $pages = $pagesMapper->map($pages);
        return $pages;
    }
    
    /**
     * @param array $data
     * @return bool
     */
    public function create(Request $request){
        $pagesMapper = new PagesMapper();
        $pages = $pagesMapper->map($request->all());
        $pages->save();
        return true;
    }
    
    /**
     * @param array $data
     */
    public function update(Request $request, $filter = []){
        $pagesMapper = new PagesMapper();
        $pages = $pagesMapper->map($request->all());
        DB::table('pages')
            ->where($filter)
            ->update($pages->toArray());
    }

    /**
     * @param array $data
     */
    public function delete($filter = []){
        DB::table('pages')
            ->where($filter)
            ->delete();
    }
}