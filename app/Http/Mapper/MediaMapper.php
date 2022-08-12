<?php

namespace App\Http\Mapper;

use App\Http\Entities\MediaEntity;

class MediaMapper{
    /**
     * @param array $data
     * @return MediaEntity
     */
    public function map(array $data): MediaEntity
    {
        $media = new MediaEntity();
        $media->setId($data['id']);
        $media->setTitle($data['title']);
        $media->setDescription($data['description']);
        $media->setType($data['type']);
        $media->setCreatedAt($data['created_at']);
        $media->setUpdatedAt($data['updated_at']);
        $media->setUrl($data['url']);
        return $media;
    }
    
    /**
     * @param Array $data
     * @return array
     */
    public function mapCollection(array $data): array
    {
        $medias = [];
        foreach ($data as $item) {
            $medias[] = $this->map($item);
        }
        return $medias;
    }
}