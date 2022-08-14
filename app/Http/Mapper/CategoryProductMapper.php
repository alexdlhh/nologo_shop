<?php

namespace App\Http\Mapper;

use App\Http\Entity\CategoryProductEntity;

class CategoryProductMapper
{
    public function map(array $data)
    {
        $categoryProduct = new CategoryProductEntity();
        $categoryProduct->setId($data['id']);
        $categoryProduct->setName($data['name']);
        return $categoryProduct;
    }
    
    public function mapCollection(array $data)
    {
        $categoryProductList = [];
        foreach ($data as $item) {
            $categoryProduct = $this->map($item);
            $categoryProductList[] = $categoryProduct;
        }
        return $categoryProductList;
    }
}