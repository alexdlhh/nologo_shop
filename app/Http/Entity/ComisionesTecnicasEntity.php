<?php

namespace App\Http\Entity;

class ComisionesTecnicasEntity
{
    public $id;
    public $name;
    public $posicion;
    public $order;
    public $image;
    public $especialidad;

    public function __construct($id = 0, $name = '', $posicion = '', $order = '', $image = '', $especialidad = '')
    {
        $this->id = $id;
        $this->name = $name;
        $this->posicion = $posicion;
        $this->order = $order;
        $this->image = $image;
        $this->especialidad = $especialidad;
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
     * @return string $posicion
     */
    public function getPosicion()
    {
        return $this->posicion;
    }

    /**
     * @return string $order
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @return string $image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @return string $especialidad
     */
    public function getEspecialidad()
    {
        return $this->especialidad;
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
     * @param string $posicion
     */
    public function setPosicion($posicion)
    {
        $this->posicion = $posicion;
    }

    /**
     * @param string $order
     */
    public function setOrder($order)
    {
        $this->order = $order;
    }

    /**
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @param string $especialidad
     */
    public function setEspecialidad($especialidad)
    {
        $this->especialidad = $especialidad;
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'posicion' => $this->posicion,
            'order' => $this->order,
            'image' => $this->image,
            'especialidad' => $this->especialidad,
        ];
    }
}