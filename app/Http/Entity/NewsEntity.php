<?php

namespace App\Http\Entity;

class NewsEntity{
    public $id;
    public $title;
    public $content;
    public $created_at;
    public $updated_at;
    public $feature_image;
    public $status;
    public $alias;
    public $subtitle;
    
    public function __construct($id=0, $title='', $content='', $created_at='', $updated_at='', $feature_image='', $status='', $alias='', $subtitle='') {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
        $this->feature_image = $feature_image;
        $this->status = $status;
        $this->alias = $alias;
        $this->subtitle = $subtitle;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function getContent()
    {
        return $this->content;
    }
    public function getCreatedAt()
    {
        return $this->created_at;
    }
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }
    public function getFeatureImage()
    {
        return $this->feature_image;
    }
    public function getStatus()
    {
        return $this->status;
    }
    public function getPermantlink()
    {
        return $this->alias;
    }
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    public function setTitle($title)
    {
        $this->title = $title;
    }
    public function setContent($content)
    {
        $this->content = $content;
    }
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
    }
    public function setFeatureImage($feature_image)
    {
        $this->feature_image = $feature_image;
    }
    public function setStatus($status)
    {
        $this->status = $status;
    }
    public function setPermantlink($alias)
    {
        $this->alias = $alias;
    }
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'feature_image' => $this->feature_image,
            'status' => $this->status,
            'alias' => $this->alias,
            'subtitle' => $this->subtitle,
        ];
    }
    
}