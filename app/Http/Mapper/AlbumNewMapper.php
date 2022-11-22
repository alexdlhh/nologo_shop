<?php
namespace App\Http\Mapper;

use App\Http\Entity\AlbumNewEntity;

class AlbumNewMapper
{
    public function map($data)
    {
        $album = new AlbumNewEntity();
        !empty($data['id'])?$album->setId($data['id']):'';
        !empty($data['url'])?$album->setUrl($data['url']):'';
        !empty($data['id_new'])?$album->setIdNew($data['id_new']):'';
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