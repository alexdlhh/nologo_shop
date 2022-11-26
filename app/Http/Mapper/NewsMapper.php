<?php

namespace App\Http\Mapper;

use App\Http\Entity\NewsEntity;

class NewsMapper{
    /**
     * @param array $data
     * @return NewsEntity
     */
    public function map(array $data): NewsEntity
    {
        $news = new NewsEntity();
        !empty($data['id'])?$news->setId($data['id']):0;
        !empty($data['title'])?$news->setTitle($data['title']):'';
        !empty($data['content'])?$news->setContent($data['content']):'';
        !empty($data['created_at'])?$news->setCreatedAt($data['created_at']):$news->setCreatedAt(date('Y-m-d H:i:s'));
        !empty($data['updated_at'])?$news->setUpdatedAt($data['updated_at']):$news->setUpdatedAt(date('Y-m-d H:i:s'));
        !empty($data['feature_image'])?$news->setFeatureImage($data['feature_image']):'';
        !empty($data['status'])?$news->setStatus($data['status']?1:0):0;
        !empty($data['permantlink'])?$news->setPermantlink($data['permantlink']):0;
        !empty($data['alias'])?$news->setPermantlink($data['alias']):0;
        !empty($data['subtitle'])?$news->setSubtitle($data['subtitle']):'';
        return $news;
    }
    
    /**
     * @param Array $data
     * @return array
     */
    public function mapCollection($data): array
    {
        $news = [];
        foreach ($data as $item) {
            if(is_array($item)){
                $news[] = $this->map($item);
            }else{
                $news[] = $this->map(get_object_vars($item));
            }
        }
        return $news;
    }
}