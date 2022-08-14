<?php
namespace App\Http\Mapper;

use App\Http\Entity\CategoryNewEntity;

class CategoryNewMapper
{
    public function map(array $data)
    {
        $categoryNew = new CategoryNewEntity();
        $categoryNew->setId($data['id']);
        $categoryNew->setName($data['name']);
        return $categoryNew;
    }

    public function mapCollection(array $data)
    {
        $categoryNewList = [];
        foreach ($data as $item) {
            $categoryNew = $this->map($item);
            $categoryNewList[] = $categoryNew;
        }
        return $categoryNewList;
    }
}