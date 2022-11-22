<?php

namespace App\Http\Mapper;

use App\Http\Entity\MediaEntity;

class MediaMapper{
    /**
     * @param array $data
     * @return MediaEntity
     */
    public function map($data): MediaEntity
    {
        $media = new MediaEntity();
        !empty($data['id']) ? $media->setId($data['id']) : null;
        !empty($data['title']) ? $media->setTitle($data['title']) : null;
        !empty($data['description']) ? $media->setDescription($data['description']) : null;
        !empty($data['type']) ? $media->setType($data['type']) : null;
        !empty($data['created_at']) ? $media->setCreatedAt($data['created_at']) : null;
        !empty($data['updated_at']) ? $media->setUpdatedAt($data['updated_at']) : null;
        !empty($data['url']) ? $media->setUrl($data['url']) : null;
        !empty($data['coleccion']) ? $media->setColeccion($data['coleccion']) : null;
        !empty($data['especialidad']) ? $media->setEspecialidad($data['especialidad']) : null;
        return $media;
    }
    
    /**
     * @param Array $data
     * @return array
     */
    public function mapCollection($data): array
    {
        $medias = [];
        foreach ($data as $item) {
            if(is_array($item)) {
                $medias[] = $this->map($item);
            }else{
                $medias[] = $this->map(get_object_vars($item));
            }
        }
        return $medias;
    }
}