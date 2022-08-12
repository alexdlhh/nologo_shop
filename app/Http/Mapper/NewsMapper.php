<?php

namespace App\Http\Mapper;

use App\Http\Entities\NewsEntity;

class NewsMapper{
    /**
     * @param array $data
     * @return NewsEntity
     */
    public function map(array $data): NewsEntity
    {
        $news = new NewsEntity();
        $news->setId($data['id']);
        $news->setTitle($data['title']);
        $news->setContent($data['content']);
        $news->setCreatedAt($data['created_at']);
        $news->setUpdatedAt($data['updated_at']);
        $news->setFeatureImage($data['feature_image']);
        $news->setStatus($data['status']);
        return $news;
    }
    
    /**
     * @param Array $data
     * @return array
     */
    public function mapCollection(array $data): array
    {
        $news = [];
        foreach ($data as $item) {
            $news[] = $this->map($item);
        }
        return $news;
    }
}