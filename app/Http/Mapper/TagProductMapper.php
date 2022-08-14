<?php

namespace App\Http\Mapper;

use App\Http\Entity\TagProductEntity;

class TagProductMapper
{
    public function map(array $data)
    {
        $tagProduct = new TagProductEntity();
        $tagProduct->setId($data['id']);
        $tagProduct->setName($data['name']);
        return $tagProduct;
    }
    
    public function mapCollection(array $data)
    {
        $tagProductList = [];
        foreach ($data as $item) {
            $tagProduct = $this->map($item);
            $tagProductList[] = $tagProduct;
        }
        return $tagProductList;
    }
}