<?php

namespace App\Http\Entity;

class ColeccionEntity{
    public $id;
    public $name;
    public $created_at;
    public $updated_at;

    public function __construct($id=0, $name='', $created_at='', $updated_at=''){
        $this->id = $id;
        $this->name = $name;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    /**
     * @return int $id
     */
    public function getId(){
        return $this->id;
    }

    /**
     * @return string $name
     */
    public function getName(){
        return $this->name;
    }

    /**
     * @return string $created_at
     */
    public function getCreatedAt(){
        return $this->created_at;
    }

    /**
     * @return string $updated_at
     */
    public function getUpdatedAt(){
        return $this->updated_at;
    }

    /**
     * @param int $id
     */
    public function setId($id){
        $this->id = $id;
    }

    /**
     * @param string $name
     */
    public function setName($name){
        $this->name = $name;
    }

    /**
     * @param string $created_at
     */
    public function setCreatedAt($created_at){
        $this->created_at = $created_at;
    }

    /**
     * @param string $updated_at
     */
    public function setUpdatedAt($updated_at){
        $this->updated_at = $updated_at;
    }

    /**
     * @return array
     */
    public function toArray(){
        return [
            'id' => $this->id,
            'name' => $this->name,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}