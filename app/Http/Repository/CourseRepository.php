<?php

namespace App\Http\Repository;

use App\Http\Entity\CourseEntity;
use App\Http\Mapper\CourseMapper;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CourseRepository
{

    /**
     * @param array $type // si esta vacio devuelve todos los cursos
     * @return array
     */
    public function getAll($type="")
    {
        $courseMapper = new CourseMapper();
        if($type == ""){
            $courses = DB::table('course')
                ->get();
        }else{
            $courses = DB::table('course')
                ->where('type',$type)
                ->get();
        }
        $courses = $courseMapper->mapCollection($courses);
        return $courses;
    }

    /**
     * @param array $filter
     * @return CourseEntity
     */
    public function getOne(int $id){
        $courseMapper = new CourseMapper();
        $course = DB::table('course')
            ->where('id',$id)
            ->first();
        $course = $courseMapper->map(get_object_vars($course));
        return $course;
    }

    /**
     * @param array $data
     * @return int
     */
    public function create(Request $request, string $convocatoria_pdf, string $inscripcion_pdf, string $formularios_pdf){
        $courseMapper = new CourseMapper();
        $course = $courseMapper->map($request->all());
        $id = DB::table('course')->insertGetId([
            'curso' => $course->getCurso(),
            'fecha' => $course->getFecha(),
            'fecha_fin' => $course->getFechaFin(),
            'lugar' => $course->getLugar(),
            'active' => $course->getActive()?1:0,
            'type' => $course->getType(),
        ]);
        if(!empty($convocatoria_pdf)){
            DB::table('course')->where('id', $id)->update(['convocatoria_pdf' => $convocatoria_pdf]);
        }
        if(!empty($inscripcion_pdf)){
            DB::table('course')->where('id', $id)->update(['inscripcion_pdf' => $inscripcion_pdf]);
        }
        if(!empty($formularios_pdf)){
            DB::table('course')->where('id', $id)->update(['formularios_pdf' => $formularios_pdf]);
        }

        return $id;
    }

    /**
     * @param array $data
     * @return int
     */
    public function update(Request $request, string $convocatoria_pdf, string $inscripcion_pdf, string $formularios_pdf){
        $courseMapper = new CourseMapper();
        $course = $courseMapper->map($request->all());
        $id = DB::table('course')->where('id', $course->getId())->update([
            'curso' => $course->getCurso(),
            'fecha' => $course->getFecha(),
            'fecha_fin' => $course->getFechaFin(),
            'lugar' => $course->getLugar(),
            'active' => $course->getActive()?1:0,
            'type' => $course->getType(),
        ]);
        if(!empty($convocatoria_pdf)){
            DB::table('course')->where('id', $course->getId())->update(['convocatoria_pdf' => $convocatoria_pdf]);
        }
        if(!empty($inscripcion_pdf)){
            DB::table('course')->where('id', $course->getId())->update(['inscripcion_pdf' => $inscripcion_pdf]);
        }
        if(!empty($formularios_pdf)){
            DB::table('course')->where('id', $course->getId())->update(['formularios_pdf' => $formularios_pdf]);
        }

        return $id;
    }

    /**
     * @param array $data
     * @return bool
     */
    public function delete(int $id){
        $course = DB::table('course')
            ->where('id', $id)
            ->delete();
        return true;
    }

    /**
     * Get total courses
     * @return int
     */
    public function getTotalCourses($school_id,$search){
        if(!empty($id)) {
            if(!empty($search)){
                $total = DB::table('course')
                    ->where('school_id', $school_id)
                    ->where('curso', 'like', '%'.$search.'%')
                    ->orderBy('id', 'desc')
                    ->count();
            }else{
                $total = DB::table('course')
                    ->where('school_id', $school_id)
                    ->count();
            }
        } else {
            if(!empty($search)){
                $total = DB::table('course')
                    ->where('curso', 'like', '%'.$search.'%')
                    ->orderBy('id', 'desc')
                    ->count();
            }else{
                $total = DB::table('course')
                    ->count();
            }
        }  
        return $total;
    }

    /**
     * Buscamos en todos los campos de course
     */
    public function search($search){
        $courseMapper = new CourseMapper();
        $courses = DB::table('course')
            ->where('curso', 'like', '%'.$search.'%')
            ->orderBy('id', 'desc')
            ->get();
        $courses = $courseMapper->mapCollection($courses);
        return $courses;
    }

    /**
     * Buscamos en todos los campos de course
     */
    public function basicsearch($search){
        $courseMapper = new CourseMapper();
        $courses = DB::table('course')
            ->where('curso', 'like', '%'.$search.'%')
            ->where('active', 1)
            ->orderBy('id', 'desc')
            ->get();
        $courses = $courseMapper->mapCollection($courses);
        return $courses;
    }
}