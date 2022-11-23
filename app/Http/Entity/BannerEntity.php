<?php

namespace App\Http\Entity;

class BannerEntity{
    public $id;
    public $url;
    public $img;
    public $active;
    public $place;

    public function __construct($id=0, $url='', $img='', $active=0, $place=0)
    {
        $this->id = $id;
        $this->url = $url;
        $this->img = $img;
        $this->active = $active;
        $this->place = $place;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getUrl()
    {
        return $this->url;
    }
    public function getImg()
    {
        return $this->img;
    }
    public function getActive()
    {
        return $this->active;
    }
    public function getPlace()
    {
        return $this->place;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    public function setUrl($url)
    {
        $this->url = $url;
    }
    public function setImg($img)
    {
        $this->img = $img;
    }
    public function setActive($active)
    {
        $this->active = $active;
    }
    public function setPlace($place)
    {
        $this->place = $place;
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'url' => $this->url,
            'img' => $this->img,
            'active' => $this->active,
            'place' => $this->place,
        ];
    }
}