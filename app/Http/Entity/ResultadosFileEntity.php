<?php

namespace App\Http\Entity;

class ResultadosFileEntity
{
    public $id;
    public $id_resultados;
    public $nombre;
    public $documento;

    public function __construct($id=0, $id_resultados=0, $nombre='', $documento='')
    {
        $this->id = $id;
        $this->id_resultados = $id_resultados;
        $this->nombre = $nombre;
        $this->documento = $documento;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getIdResultados()
    {
        return $this->id_resultados;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getDocumento()
    {
        return $this->documento;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setIdResultados($id_resultados)
    {
        $this->id_resultados = $id_resultados;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setDocumento($documento)
    {
        $this->documento = $documento;
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'id_resultados' => $this->id_resultados,
            'nombre' => $this->nombre,
            'documento' => $this->documento,
        ];
    }
}