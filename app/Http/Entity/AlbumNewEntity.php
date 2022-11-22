<?php

namespace App\Http\Entity;

class AlbumNewEntity{
    public $id;
    public $url;
    public $id_new;

    public function __construct($id=0, $url='', $id_new='')
    {
        $this->id = $id;
        $this->url = $url;
        $this->id_new = $id_new;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function getIdNew()
    {
        return $this->id_new;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function setIdNew($id_new)
    {
        $this->id_new = $id_new;
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'url' => $this->url,
            'id_new' => $this->id_new,
        ];
    }
}