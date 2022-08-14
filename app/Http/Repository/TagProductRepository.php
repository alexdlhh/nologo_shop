<?php

namespace App\Http\Repository;

use App\Http\Entity\TagProductEntity;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TagProductRepository
{

    /**
     * @param array $data
     * @return array
     */
    public function getAll($filter = [])
    {
        $tagProductMapper = new TagProductMapper();
        $tagProductList = [];
        if(!empty($filter)) {
            $tagProduct = DB::table('tag_product')
                ->where($filter)
                ->get();
        } else {
            $tagProduct = DB::table('tag_product')
                ->get();
        }
        if(!empty($tagProduct->toArray())) {
            $tagProduct = $tagProductMapper->mapCollection($tagProduct->toArray());
        }
        return $tagProductList;
    }
    
    /**
     * @param array $filter
     * @return TagProductEntity
     */
    public function getOne($filter = []){
        $tagProductMapper = new TagProductMapper();
        $tagProduct = DB::table('tag_product')
            ->where($filter)
            ->first();
        $tagProduct = $tagProductMapper->map($tagProduct);
        return $tagProduct;
    }
    
    /**
     * @param array $data
     * @return int
     */
    public function create(Request $request){
        $tagProductMapper = new TagProductMapper();
        $data = $request->all();
        $tagProduct = $tagProductMapper->map($data);
        $tagProduct->save();
        return $tagProduct->id;
    }
}