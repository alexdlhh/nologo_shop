<?php 

namespace App\Http\Mapper;

use App\Http\Entity\PagesEntity;

class PagesMapper{
    public function map($data){
        return new PagesEntity($data->id, $data->title, $data->url, $data->section, $data->order, $data->id_dad);
    }

    public function mapCollection($data){
        $pages = [];
        foreach ($data as $item) {
            $pages[] = $this->map($item);
        }
        return $pages;
    }
}