<?php
namespace App\Http\Mapper;

use App\Http\Entity\CourseEntity;

class CourseMapper
{
    /**
     * @param array $data
     * @return CourseEntity
     */
    public function map(array $data): CourseEntity
    {
        $course = new CourseEntity();
        !empty($data['id']) ? $course->setId($data['id']) : null;
        !empty($data['curso']) ? $course->setCurso($data['curso']) : null;
        !empty($data['fecha']) ? $course->setFecha($data['fecha']) : null;
        !empty($data['fecha_fin']) ? $course->setFechaFin($data['fecha_fin']) : null;
        !empty($data['lugar']) ? $course->setLugar($data['lugar']) : null;
        !empty($data['active']) ? $course->setActive($data['active']) : null;
        !empty($data['type']) ? $course->setType($data['type']) : null;
        !empty($data['type2']) ? $course->setType2($data['type2']) : null;
        !empty($data['convocatoria_pdf']) ? $course->setConvocatoriaPdf($data['convocatoria_pdf']) : null;
        !empty($data['inscripcion_pdf']) ? $course->setInscripcionPdf($data['inscripcion_pdf']) : null;
        !empty($data['formularios_pdf']) ? $course->setFormulariosPdf($data['formularios_pdf']) : null;
        !empty($data['convocatoria_link']) ? $course->setConvocatoriaLink($data['convocatoria_link']) : null;
        !empty($data['inscripcion_link']) ? $course->setInscripcionLink($data['inscripcion_link']) : null;
        !empty($data['formularios_link']) ? $course->setFormulariosLink($data['formularios_link']) : null;
        return $course;
    }

    /**
     * @param Array $data
     * @return array
     */
    public function mapCollection($data): array
    {
        $courses = [];
        foreach ($data as $item) {
            if(is_array($item)) {
                $courses[] = $this->map($item);
            }else{
                $courses[] = $this->map(get_object_vars($item));
            }
        }
        return $courses;
    }
}