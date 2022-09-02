<?php

namespace App\Http\Entity;

class MediaEntity{
    public $id;
    public $title;
    public $description;
    public $type;
    public $created_at;
    public $updated_at;
    public $url;
    public $coleccion;

    public function __construct($id=0, $title='', $description='', $type='', $created_at='', $updated_at='', $url='', $coleccion=0){
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->type = $type;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
        $this->url = $url;
        $this->coleccion = $coleccion;
    }

    /**
     * @return int $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return string $type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string $created_at
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @return string $updated_at
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * @return string $url
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return int $coleccion
     */
    public function getColeccion()
    {
        return $this->coleccion;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @param string $created_at
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    /**
     * @param string $updated_at
     */
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @param int $coleccion
     */
    public function setColeccion($coleccion)
    {
        $this->coleccion = $coleccion;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'type' => $this->type,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'url' => $this->url,
            'coleccion' => $this->coleccion,
        ];
    }
}