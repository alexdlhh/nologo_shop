<?php
namespace App\Http\Mapper;

use App\Http\Entity\RFEGTitleEntity;

class RFEGTitleMapper
{
    public function map($data)
    {
        $title = new RFEGTitleEntity();
        !empty($data['id'])?$title->setId($data['id']):'';
        !empty($data['name'])?$title->setName($data['name']):'';
        !empty($data['type'])?$title->setType($data['type']):'';
        return $title;
    }

    public function mapCollection($data)
    {
        $titleList = [];
        foreach ($data as $item) {
            if(is_array($item)){
                $titleList[] = $this->map($item);
            }else{
                $titleList[] = $this->map(get_object_vars($item));                
            }
        }
        return $titleList;
    }
}