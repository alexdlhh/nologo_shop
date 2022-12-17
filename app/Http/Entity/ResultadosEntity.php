<?php

namespace App\Http\Entity;

class ResultadosEntity
{
    public $id;
    public $especialidad;
    public $name;
    public $fecha_inicio;
    public $fecha_fin;
    public $lugar;

    public function __construct($id=0, $especialidad='', $name='', $fecha_inicio='', $fecha_fin='', $lugar='')
    {
        $this->id = $id;
        $this->especialidad = $especialidad;
        $this->name = $name;
        $this->fecha_inicio = $fecha_inicio;
        $this->fecha_fin = $fecha_fin;
        $this->lugar = $lugar;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getEspecialidad()
    {
        return $this->especialidad;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getFechaInicio()
    {
        return $this->fecha_inicio;
    }

    public function getFechaFin()
    {
        return $this->fecha_fin;
    }

    public function getLugar()
    {
        return $this->lugar;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setEspecialidad($especialidad)
    {
        $this->especialidad = $especialidad;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setFechaInicio($fecha_inicio)
    {
        $this->fecha_inicio = $fecha_inicio;
    }

    public function setFechaFin($fecha_fin)
    {
        $this->fecha_fin = $fecha_fin;
    }

    public function setLugar($lugar)
    {
        $this->lugar = $lugar;
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'especialidad' => $this->especialidad,
            'name' => $this->name,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_fin' => $this->fecha_fin,
            'lugar' => $this->lugar,
        ];
    }
}