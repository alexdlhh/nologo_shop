<?php

namespace App\Http\Entity;

class CourseEntity
{
    public $id;
    public $curso;
    public $fecha;
    public $fecha_fin;
    public $lugar;
    public $convocatoria_pdf;
    public $inscripcion_pdf;
    public $formularios_pdf;
    public $active;
    public $type;
    
    public function __construct($id = 0, $curso = '', $fecha = '', $fecha_fin = '', $lugar = '', $convocatoria_pdf = '', $inscripcion_pdf = '', $formularios_pdf = '', $active = '', $type = '')
    {
        $this->id = $id;
        $this->curso = $curso;
        $this->fecha = $fecha;
        $this->fecha_fin = $fecha_fin;
        $this->lugar = $lugar;
        $this->convocatoria_pdf = $convocatoria_pdf;
        $this->inscripcion_pdf = $inscripcion_pdf;
        $this->formularios_pdf = $formularios_pdf;
        $this->active = $active;
        $this->type = $type;
    }

    /**
     * @return int $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string $curso
     */
    public function getCurso()
    {
        return $this->curso;
    }

    /**
     * @return string $fecha
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @return string $fecha_fin
     */
    public function getFechaFin()
    {
        return $this->fecha_fin;
    }

    /**
     * @return string $lugar
     */
    public function getLugar()
    {
        return $this->lugar;
    }

    /**
     * @return string $convocatoria_pdf
     */
    public function getConvocatoriaPdf()
    {
        return $this->convocatoria_pdf;
    }

    /**
     * @return string $inscripcion_pdf
     */
    public function getInscripcionPdf()
    {
        return $this->inscripcion_pdf;
    }

    /**
     * @return string $formularios_pdf
     */
    public function getFormulariosPdf()
    {
        return $this->formularios_pdf;
    }
    
    /**
     * @return string $active
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @return string $type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param string $curso
     */
    public function setCurso($curso)
    {
        $this->curso = $curso;
    }

    /**
     * @param string $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * @param string $fecha_fin
     */
    public function setFechaFin($fecha_fin)
    {
        $this->fecha_fin = $fecha_fin;
    }

    /**
     * @param string $lugar
     */
    public function setLugar($lugar)
    {
        $this->lugar = $lugar;
    }

    /**
     * @param string $convocatoria_pdf
     */
    public function setConvocatoriaPdf($convocatoria_pdf)
    {
        $this->convocatoria_pdf = $convocatoria_pdf;
    }

    /**
     * @param string $inscripcion_pdf
     */
    public function setInscripcionPdf($inscripcion_pdf)
    {
        $this->inscripcion_pdf = $inscripcion_pdf;
    }

    /**
     * @param string $formularios_pdf
     */
    public function setFormulariosPdf($formularios_pdf)
    {
        $this->formularios_pdf = $formularios_pdf;
    }

    /**
     * @param string $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'id' => $this->id,
            'curso' => $this->curso,
            'fecha' => $this->fecha,
            'fecha_fin' => $this->fecha_fin,
            'lugar' => $this->lugar,
            'convocatoria_pdf' => $this->convocatoria_pdf,
            'inscripcion_pdf' => $this->inscripcion_pdf,
            'formularios_pdf' => $this->formularios_pdf,
            'active' => $this->active,
            'type' => $this->type,
        ];
    }

}
