<?php

namespace App\Http\Mapper;

use App\Http\Entity\TagNewEntity;

class TagNewMapper
{
    public function map(array $data)
    {
        $tagNew = new TagNewEntity(0,'');
        !empty($data['id'])?$tagNew->setId($data['id']):'';
        !empty($data['name'])?$tagNew->setName($data['name']):'';
        return $tagNew;
    }
    
    public function mapCollection(array $data)
    {
        $tagNewList = [];
        foreach ($data as $item) {
            if(is_array($item)){
                $tagNewList[] = $this->map($item);
            }else{
                $tagNewList[] = $this->map(get_object_vars($item));
            }
        }
        return $tagNewList;
    }
}