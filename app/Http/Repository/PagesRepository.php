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
    public function getAll($colum='',$condition='',$value='')
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

    /**
     * getAllPages
     */
    public function getAllPages(){
        $pagesMapper = new PagesMapper();
        $pages = DB::table('statics')
            ->get();
        return $pages;
    }

    /**
     * getOnePage
     */
    public function getOnePage($id){
        $pagesMapper = new PagesMapper();
        $pages = DB::table('statics')
            ->where(['id' => $id])
            ->get();
        return $pages;
    }

    /**
     * savePage
     */
    public function savePage(Request $request){
        $data = $request->all();
        DB::table('statics')
        ->where(['id' => $data['id']])
        ->update([
            'title' => $data['title'],
            'description' => $data['description'],
            'permantlink' => $data['permantlink'],
        ]);
        return true;
    }

    public function getGeneralAdmin(){
        $pagesMapper = new PagesMapper();
        $pages = DB::table('general')
        ->where(['admin' => 1])
        ->get();
        return $pages;
    }

    public function saveGeneral($request,$meta_value){
        $data = $request->all();
        DB::table('general')
        ->where(['meta_key' => $data['meta_key']])
        ->update([
            'meta_value' => $meta_value,
        ]);
        return true;
    }

    public function getStaticBySlug($slug){
        $pagesMapper = new PagesMapper();
        $pages = DB::table('statics')
        ->where(['permantlink' => $slug])
        ->get();
        return $pages;
    }

    /**
     * Buscamos coincidencias en todas las columnas de la tabla pages
     */
    public function search($search){
        $pagesMapper = new PagesMapper();
        $pages = DB::table('pages')
        ->where('title', 'like', '%'.$search.'%')
        ->orWhere('description', 'like', '%'.$search.'%')
        ->orWhere('url', 'like', '%'.$search.'%')->get();
        
        return $pages;
    }
}