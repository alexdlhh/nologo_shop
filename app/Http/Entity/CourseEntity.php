<?php

namespace App\Http\Entity;

class CourseEntity
{
    public $id;
    public $name;
    public $description;
    public $price;
    public $image;
    public $duration;
    public $school_id;
    public $created_at;
    public $updated_at;
    public $inscripcion;

    public function __construct($id=0, $name='', $description='', $price=0, $image='', $duration=0, $school_id=0, $created_at='', $updated_at='',$inscripcion='')
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->image = $image;
        $this->duration = $duration;
        $this->school_id = $school_id;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
        $this->inscripcion = $inscripcion;
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
     * @return float $price
     */
    public function getPrice()
    {
        return $this->price;
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
     * @return int $duration
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @return int $school_id
     */
    public function getSchoolId()
    {
        return $this->school_id;
    }

    /**
     * @return int $inscripcion
     */
    public function getInscripcion()
    {
        return $this->inscripcion;
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
     * @param float $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
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
     * @param int $duration
     */
    public function setDuration($duration){
        $this->duration = $duration;
    }

    /**
     * @param int $school_id
     */
    public function setSchoolId($school_id){
        $this->school_id = $school_id;
    }

    /**
     * @param int $inscripcion
     */
    public function setInscripcion($inscripcion){
        $this->inscripcion = $inscripcion;
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
            'price' => $this->price,
            'image' => $this->image,
            'duration' => $this->duration,
            'school_id' => $this->school_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'inscripcion' => $this->inscripcion
        ];
    }
}