<?php

namespace App\Http\Repository;

use App\Http\Entity\NewsEntity;
use App\Http\Mapper\NewsMapper;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class NewsRepository
{

    /**
     * @param array $data
     * @return array
     */
    public function getAll($filter = [])
    {
        $newsMapper = new NewsMapper();
    
        if(!empty($filter)) {
            $news = DB::table('news')
                ->where($filter)
                ->get();
        } else {
            $news = DB::table('news')
                ->get();
        }
        
        $newsList = $newsMapper->mapCollection($news);
        return $newsList;
    }
    
    /**
     * @param array $filter
     * @return NewsEntity
     */
    public function getOne($filter = []){
        $newsMapper = new NewsMapper();
        $news = DB::table('news')
            ->where($filter)
            ->first();
        $news = $newsMapper->map($news);
        return $news;
    }
    
    /**
     * @param array $data
     * @return bool
     */
    public function create(Request $request){
        $newsMapper = new NewsMapper();
        $news = $newsMapper->map($request->all());
        $news->save();
        return true;
    }
    
    /**
     * @param array $data
     * @return bool
     */
    public function update(Request $request){
        $newsMapper = new NewsMapper();
        $news = $newsMapper->map($request->all());
        $news->save();
        return true;
    }

    /**
     * @param array $data
     */
    public function delete(Request $request){
        $newsMapper = new NewsMapper();
        $news = $newsMapper->map($request->all());
        $news->delete();
    }
}