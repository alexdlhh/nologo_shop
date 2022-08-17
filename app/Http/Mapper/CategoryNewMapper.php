<?php
namespace App\Http\Mapper;

use App\Http\Entity\CategoryNewEntity;

class CategoryNewMapper
{
    public function map(array $data)
    {
        $categoryNew = new CategoryNewEntity();
        !empty($data['id'])?$categoryNew->setId($data['id']):'';
        !empty($data['name'])?$categoryNew->setName($data['name']):'';
        return $categoryNew;
    }

    public function mapCollection(array $data)
    {
        $categoryNewList = [];
        foreach ($data as $item) {
            if(is_array($item)){
                $categoryNewList[] = $this->map($item);
            }else{
                $categoryNewList[] = $this->map(get_object_vars($item));
            }
        }
        return $categoryNewList;
    }
}