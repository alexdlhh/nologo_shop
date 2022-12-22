<?php

namespace App\Http\Entity;

class EventoEntity{
    public $id;
    public $competicion;
    public $fecha;
    public $licencia;
    public $inscripcion;
    public $sorteo;
    public $especialidad;
    public $nacional;
    public $active;
    public $download_pdf;
    public $fecha_fin;
    public $olimpico;
    public $image;

    public function __construct($id=0, $competicion='', $fecha='', $licencia='', $inscripcion='', $sorteo='', $especialidad='', $nacional='', $active='', $download_pdf='', $fecha_fin='', $olimpico='', $image=''){
        $this->id = $id;
        $this->competicion = $competicion;
        $this->fecha = $fecha;
        $this->licencia = $licencia;
        $this->inscripcion = $inscripcion;
        $this->sorteo = $sorteo;
        $this->especialidad = $especialidad;
        $this->nacional = $nacional;
        $this->active = $active;
        $this->download_pdf = $download_pdf;
        $this->fecha_fin = $fecha_fin;
        $this->olimpico = $olimpico;
    }

    /**
     * @return int $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string $competicion
     */
    public function getCompeticion()
    {
        return $this->competicion;
    }

    /**
     * @return string $fecha
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @return string $licencia
     */
    public function getLicencia()
    {
        return $this->licencia;
    }

    /**
     * @return string $inscripcion
     */
    public function getInscripcion()
    {
        return $this->inscripcion;
    }

    /**
     * @return string $sorteo
     */
    public function getSorteo()
    {
        return $this->sorteo;
    }

    /**
     * @return string $especialidad
     */
    public function getEspecialidad()
    {
        return $this->especialidad;
    }

    /**
     * @return string $nacional
     */
    public function getNacional()
    {
        return $this->nacional;
    }

    /**
     * @return string $active
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @return string $download_pdf
     */
    public function getDownloadPdf()
    {
        return $this->download_pdf;
    } 

    /**
     * @return string $fecha_fin
     */
    public function getFechaFin()
    {
        return $this->fecha_fin;
    }

    /**
     * @return string $olimpico
     */
    public function getOlimpico()
    {
        return $this->olimpico;
    }

    /**
     * @return string $image
     */
    public function getImage()
    {
        return $this->image;
    }
    
    /**
     * Set the value of id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Set the value of competicion
     */
    public function setCompeticion($competicion)
    {
        $this->competicion = $competicion;
    }

    /**
     * Set the value of fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * Set the value of licencia
     */
    public function setLicencia($licencia)
    {
        $this->licencia = $licencia;
    }

    /**
     * Set the value of inscripcion
     */
    public function setInscripcion($inscripcion)
    {
        $this->inscripcion = $inscripcion;
    }

    /**
     * Set the value of sorteo
     */
    public function setSorteo($sorteo)
    {
        $this->sorteo = $sorteo;
    }

    /**
     * Set the value of especialidad
     */
    public function setEspecialidad($especialidad)
    {
        $this->especialidad = $especialidad;
    }

    /**
     * Set the value of nacional
     */
    public function setNacional($nacional)
    {
        $this->nacional = $nacional;
    }

    /**
     * Set the value of active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    /**
     * Set the value of download_pdf
     */
    public function setDownloadPdf($download_pdf)
    {
        $this->download_pdf = $download_pdf;
    }

    /**
     * Set the value of fecha_fin
     */
    public function setFechaFin($fecha_fin)
    {
        $this->fecha_fin = $fecha_fin;
    }

    /**
     * Set the value of olimpico
     */
    public function setOlimpico($olimpico)
    {
        $this->olimpico = $olimpico;
    }

    /**
     * Set the value of image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }
    
    public function getArray(){
        return [
            'id' => $this->id,
            'competicion' => $this->competicion,
            'fecha' => $this->fecha,
            'licencia' => $this->licencia,
            'inscripcion' => $this->inscripcion,
            'sorteo' => $this->sorteo,
            'especialidad' => $this->especialidad,
            'nacional' => $this->nacional,
            'active' => $this->active,
            'download_pdf' => $this->download_pdf,
            'fecha_fin' => $this->fecha_fin,
            'olimpico' => $this->olimpico,
            'image' => $this->image
        ];
    }
}