<?php

namespace App\Http\Entity;

class RFEGTitleEntity{
    public $id;
    public $name;
    public $type;
    public $subtype;

    public function __construct($id=0, $name='', $type='', $subtype='')
    {
        $this->id = $id;
        $this->name = $name;
        $this->type = $type;
        $this->subtype = $subtype;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getSubtype()
    {
        return $this->subtype;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function setSubtype($subtype)
    {
        $this->subtype = $subtype;
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'type' => $this->type,
            'subtype' => $this->subtype
        ];
    }
}