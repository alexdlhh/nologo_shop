<?php

namespace App\Http\Entity;

class SponsorEntity{
    public $id;
    public $name;
    public $description;
    public $image;
    public $created_at;
    public $updated_at;
    public $url;
    
    public function __construct($id, $name, $description, $image, $created_at, $updated_at, $url)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->image = $image;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
        $this->url = $url;
    }
    
    /**
     * @return int $id
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }
    
    /**
     * @return string $image
     */
    public function getImage()
    {
        return $this->image;
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
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
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
     * @return array
     */
    public function toArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'image' => $this->image,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'url' => $this->url,
        ];
    }
}