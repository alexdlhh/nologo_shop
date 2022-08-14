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
        $newsList = [];

        if(!empty($filter)) {
            $news = DB::table('new')
                ->where($filter)
                ->get();
        } else {
            $news = DB::table('new')
                ->get();
        }
        if(!empty($news->toArray())) {
            $news = $newsMapper->mapCollection($news->toArray());
        }
        
        return $newsList;
    }
    
    /**
     * @param array $filter
     * @return NewsEntity
     */
    public function getOne($filter = []){
        $newsMapper = new NewsMapper();
        $news = DB::table('new')
            ->where($filter)
            ->first();
        $news = $newsMapper->map($news);
        return $news;
    }
    
    /**
     * @param array $data
     * @return int
     */
    public function create(Request $request, String $image_url){
        $newsMapper = new NewsMapper();
        $data = $request->all();
        $data['feature_image'] = $image_url;
        $news = $newsMapper->map($data);
        $news->save();
        //obtenemos la ultima id creada
        $id = $news->id;
        //creamos las relaciones de la noticia con la categorias en new_cat_rel
        foreach($data['categories'] as $category) {
            DB::table('new_cat_rel')->insert(
                ['new_id' => $id, 'cat_id' => $category]
            );
        }
        //creamos las relaciones de la noticia con los tags en new_tag_rel
        foreach($data['tags'] as $tag) {
            DB::table('new_tag_rel')->insert(
                ['new_id' => $id, 'tag_id' => $tag]
            );
        }
        return $id;
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