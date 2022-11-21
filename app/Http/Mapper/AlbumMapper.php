<?php
namespace App\Http\Mapper;

use App\Http\Entity\AlbumEntity;

class AlbumMapper
{
    public function map($data)
    {
        $album = new AlbumEntity();
        !empty($data['id'])?$album->setId($data['id']):'';
        !empty($data['name'])?$album->setName($data['name']):'';
        !empty($data['created_at'])?$album->setCreatedAt($data['created_at']):'';
        !empty($data['updated_at'])?$album->setUpdatedAt($data['updated_at']):'';
        return $album;
    }

    public function mapCollection($data)
    {
        $albumList = [];
        foreach ($data as $item) {
            if(is_array($item)){
                $albumList[] = $this->map($item);
            }else{
                $albumList[] = $this->map(get_object_vars($item));
            }
        }
        return $albumList;
    }
}