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
            if(!empty($filter['searchCriteria'])){
                if(!empty($filter['fecha_search'])){
                    $filter['fecha_search'] = date('Y-m-d', strtotime(str_replace('/','-',$filter['fecha_search'])));
                    $news = DB::table('new')
                    ->where('status', $filter['status'])
                    ->where('title', 'like', '%'.$filter['searchCriteria'].'%')
                    ->where('created_at', 'like', '%'.$filter['fecha_search'].'%')
                    ->orderBy('id', 'desc')
                    ->skip($filter['page']==1?0:$filter['page']*10)->take(10)->get();
                }else{
                    $news = DB::table('new')
                    ->where('status', $filter['status'])
                    ->where('title', 'like', '%'.$filter['searchCriteria'].'%')
                    ->orderBy('id', 'desc')
                    ->skip($filter['page']==1?0:$filter['page']*10)->take(10)->get();
                }
            }elseif(!empty($filter['fecha_search'])){
                $filter['fecha_search'] = date('Y-m-d', strtotime(str_replace('/','-',$filter['fecha_search'])));
                $news = DB::table('new')
                ->where('status', $filter['status'])
                ->where('created_at', 'like', '%'.$filter['fecha_search'].'%')
                ->orderBy('id', 'desc')
                ->skip($filter['page']==1?0:$filter['page']*10)->take(10)->get();
            }else{
                $news = DB::table('new')
                ->where('status', $filter['status'])
                ->orderBy('id', 'desc')
                ->skip($filter['page']==1?0:$filter['page']*10)->take(10)->get();
            }   
        } else {
            $news = DB::table('new')
                ->get();
        }
        if(!empty($news->toArray())) {
            $newsList = $newsMapper->mapCollection($news->toArray());
        }
        
        return $newsList;
    }

    /**
     * @param array $data
     * @return array
     */
    function getTotalNews($filter = [])
    {
        $newsMapper = new NewsMapper();
        $newsList = [];
        
        if(!empty($filter)) {
            if(!empty($filter['searchCriteria'])){
                if(!empty($filter['fecha_search'])){
                    $filter['fecha_search'] = date('Y-m-d', strtotime(str_replace('/','-',$filter['fecha_search'])));
                    $news = DB::table('new')
                    ->where('status', $filter['status'])
                    ->where('title', 'like', '%'.$filter['searchCriteria'].'%')
                    ->where('created_at', 'like', '%'.$filter['fecha_search'].'%')
                    ->orderBy('id', 'desc')
                    ->skip($filter['page']==1?0:$filter['page']*10)->take(10)->count();
                }else{
                    $news = DB::table('new')
                    ->where('status', $filter['status'])
                    ->where('title', 'like', '%'.$filter['searchCriteria'].'%')
                    ->orderBy('id', 'desc')
                    ->skip($filter['page']==1?0:$filter['page']*10)->take(10)->count();
                }
            }elseif(!empty($filter['fecha_search'])){
                $filter['fecha_search'] = date('Y-m-d', strtotime(str_replace('/','-',$filter['fecha_search'])));
                $news = DB::table('new')
                ->where('status', $filter['status'])
                ->where('created_at', 'like', '%'.$filter['fecha_search'].'%')
                ->orderBy('id', 'desc')
                ->skip($filter['page']==1?0:$filter['page']*10)->take(10)->count();
            }else{
                $news = DB::table('new')
                ->where('status', $filter['status'])
                ->orderBy('id', 'desc')
                ->skip($filter['page']==1?0:$filter['page']*10)->take(10)->count();
            }            
        } else {
            $news = DB::table('new')
                ->count();
        }
        return $news;
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
     * @return NewsEntity
     */
    public function getById($id)
    {
        $newsMapper = new NewsMapper();
        $news = DB::table('new')
            ->where('id', $id)
            ->first();
        //hacemos $new array para que no se devuelva un objeto
        $news = $newsMapper->map(get_object_vars($news));
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
        //guardamos la noticia en la base de datos
        $id = DB::table('new')
            ->insertGetId([
                'title' => $news->getTitle(),
                'subtitle' => $news->getSubtitle(),
                'content' => $news->getContent(),
                'created_at' => $news->getCreatedAt(),
                'updated_at' => $news->getUpdatedAt(),
                'feature_image' => $news->getFeatureImage(),
                'status' => $news->getStatus(),
                'alias' => $news->getPermantlink()
            ]);
        //obtenemos la ultima id creada
        //creamos las relaciones de la noticia con la categorias en new_cat_rel
        $data['category'] = explode(',', $data['category']);
        foreach($data['category'] as $category) {
            DB::table('cat_new_rel')->insert(
                ['id_new' => $id, 'id_cat' => $category]
            );
        }
        //creamos las relaciones de la noticia con los tags en new_tag_rel
        $data['tags'] =  explode(',', $data['tags']);
        foreach($data['tags'] as $tag) {
            DB::table('tag_new_rel')->insert(
                ['id_new' => $id, 'id_tag' => $tag]
            );
        }
        return $id;
    }
    
    /**
     * @param array $data
     * @return bool
     */
    public function update(Request $request, String $image_url){
        $newsMapper = new NewsMapper();
        $data = $request->all();
        DB::table('new')
            ->where('id', $data['id'])
            ->update([
                'title' => $data['title'],
                'subtitle' => $data['subtitle'],
                'content' => $data['content'],
                'updated_at' => date('Y-m-d H:i:s'),
                'status' => $data['status']?1:0,
                'alias' => $data['permantlink'],
                'feature_image' => $image_url,
            ]);
        //borramos las relaciones de la noticia con las categorias en new_cat_rel
        DB::table('cat_new_rel')->where('id_new', $data['id'])->delete();
        //creamos las relaciones de la noticia con las categorias en new_cat_rel
        $data['category'] = explode(',', $data['category']);
        foreach($data['category'] as $category) {
            DB::table('cat_new_rel')->insert(
                ['id_new' =>$data['id'], 'id_cat' => $category]
            );
        }
        //borramos las relaciones de la noticia con los tags en new_tag_rel
        DB::table('tag_new_rel')->where('id_new', $data['id'])->delete();
        //creamos las relaciones de la noticia con los tags en new_tag_rel
        $data['tags'] =  explode(',', $data['tags']);
        foreach($data['tags'] as $tag) {
            DB::table('tag_new_rel')->insert(
                ['id_new' => $data['id'], 'id_tag' => $tag]
            );
        }
        return $data['id'];
    }

    /**
     * @param int $id
     */
    public function delete($id){
        //obtenemos la noticia a eliminar para saber que imagen debemos borrar
        $news = $this->getById($id);
        unlink($news->getFeatureImage());
        //borramos la noticia
        DB::table('new')
            ->where('id', $id)
            ->delete();
        DB::table('cat_new_rel')
            ->where('id_new', $id)
            ->delete();
        DB::table('tag_new_rel')
            ->where('id_new', $id)
            ->delete();
        return true;
    }

    /**
     * @param int $status
     */
    public function changeState(Request $request){
        $newsMapper = new NewsMapper();
        $news = $newsMapper->map($request->all());
        $query = DB::table('new')
            ->where('id', $news->id)
            ->update(['status' => $news->status]);
        return $query;
    }

    /**
     * @param int $limit
     * @return array
     */
    public function getNews($limit){
        $newsMapper = new NewsMapper();
        $news = DB::table('new')
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->take($limit)
            ->get();
        $news = $newsMapper->mapCollection($news);
        return $news;
    }

    /**
     * Get by year and month the news, had to check created_at who is a datetime, so we need to compare the year and month of the datetime
     * @param int $year
     * @param int $month
     * @return array
     */
    public function getNewsByYearAndMonth($year, $month, $init=0, $limit=10){
        $newsMapper = new NewsMapper();
        //vamos a buscar en la base de datos las noticias que tengan el año y mes que nos pasan con un like
        if($year=='todo'){
            $news = DB::table('new')
                ->where('status', 1)
                ->orderBy('created_at', 'desc')
                ->skip($init)
                ->take($limit)
                ->get();
        }else{
            $news = DB::table('new')
                ->where('status', 1)
                ->orderBy('created_at', 'desc')
                ->skip($init)
                ->take($limit)
                ->get();
            }
        $news = $newsMapper->mapCollection($news->toArray());
        return $news;        
    }

    /**
     * get by permantlink the new
     * @param string $permantlink
     * @return array
     */
    public function getNewsByPermantlink($permantlink){
        $newsMapper = new NewsMapper();
        $news = DB::table('new')
            ->where('status', 1)
            ->where('alias', $permantlink)
            ->first();
        $news = $newsMapper->map(get_object_vars($news));
        return $news;
    }

    /**
     * Get the 5 last news
     * @return array
     */
    public function getLastNews(){
        $newsMapper = new NewsMapper();
        $news = DB::table('new')
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
        $news = $newsMapper->mapCollection($news);
        return $news;
    }
}