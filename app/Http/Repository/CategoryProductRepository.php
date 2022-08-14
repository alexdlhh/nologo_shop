<?php

namespace App\Http\Repository;

use App\Http\Entity\CategoryProductEntity;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CategoryProductRepository
{

    /**
     * @param array $data
     * @return array
     */
    public function getAll($filter = [])
    {
        $categoryProductMapper = new CategoryProductMapper();
        $categoryProductList = [];
        if(!empty($filter)) {
            $categoryProduct = DB::table('category_product')
                ->where($filter)
                ->get();
        } else {
            $categoryProduct = DB::table('category_product')
                ->get();
        }
        if(!empty($categoryProduct->toArray())) {
            $categoryProduct = $categoryProductMapper->mapCollection($categoryProduct->toArray());
        }
        return $categoryProductList;
    }
    
    /**
     * @param array $filter
     * @return CategoryProductEntity
     */
    public function getOne($filter = []){
        $categoryProductMapper = new CategoryProductMapper();
        $categoryProduct = DB::table('category_product')
            ->where($filter)
            ->first();
        $categoryProduct = $categoryProductMapper->map($categoryProduct);
        return $categoryProduct;
    }
    
    /**
     * @param array $data
     * @return int
     */
    public function create(Request $request){
        $categoryProductMapper = new CategoryProductMapper();
        $data = $request->all();
        $categoryProduct = $categoryProductMapper->map($data);
        $categoryProduct->save();
        return $categoryProduct->id;
    }
}