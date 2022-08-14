<?php

namespace App\Http\Mapper;

use App\Http\Entity\TagNewEntity;

class TagNewMapper
{
    public function map(array $data)
    {
        $tagNew = new TagNewEntity();
        $tagNew->setId($data['id']);
        $tagNew->setName($data['name']);
        return $tagNew;
    }
    
    public function mapCollection(array $data)
    {
        $tagNewList = [];
        foreach ($data as $item) {
            $tagNew = $this->map($item);
            $tagNewList[] = $tagNew;
        }
        return $tagNewList;
    }
}