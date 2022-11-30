<?php

namespace App\Http\Entity;

class Table2Entity{
    public $id;
    public $nombre;
    public $cargo;
    public $especialidad;
    public $order;

    public function __construct($id=0, $nombre='', $cargo='', $especialidad='', $order='')
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->cargo = $cargo;
        $this->especialidad = $especialidad;
        $this->order = $order;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getCargo()
    {
        return $this->cargo;
    }

    public function getEspecialidad()
    {
        return $this->especialidad;
    }

    public function getOrder()
    {
        return $this->order;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setCargo($cargo)
    {
        $this->cargo = $cargo;
    }

    public function setEspecialidad($especialidad)
    {
        $this->especialidad = $especialidad;
    }

    public function setOrder($order)
    {
        $this->order = $order;
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'cargo' => $this->cargo,
            'especialidad' => $this->especialidad,
            'order' => $this->order,
        ];
    }

}