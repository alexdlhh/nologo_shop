<?php

namespace App\Http\Repository;

use App\Http\Entity\CourseEntity;
use App\Http\Mapper\CourseMapper;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CourseRepository
{

    /**
     * @param array $data
     * @return array
     */
    public function getAll($school_id=0,$page=1,$search='')
    {
        $courseMapper = new CourseMapper();
        $page = ($school_id-1)*10;
        if(!empty($id)) {
            if(!empty($search)){
                $courses = DB::table('course')
                    ->where('school_id', $school_id)
                    ->where('name', 'like', '%'.$search.'%')
                    ->orderBy('id', 'desc')
                    ->skip($page)->take(10)->get();
            }else{
                $courses = DB::table('course')
                    ->where('school_id', $school_id)
                    ->skip($page)->take(10)->get();
            }
        } else {
            if(!empty($search)){
                $courses = DB::table('course')
                    ->where('name', 'like', '%'.$search.'%')
                    ->orderBy('id', 'desc')
                    ->skip($page)->take(10)->get();
            }else{
                $courses = DB::table('course')
                    ->skip($page)->take(10)->get();
            }
        }
        $aux = [];
        foreach ($courses as $course) {
            $aux[] = $course;
        }
        $courseList = $courseMapper->mapCollection($aux);
        return $courseList;
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
    public function create(Request $request, string $image_url, string $inscripcion_url){
        $courseMapper = new CourseMapper();
        $course = $courseMapper->map($request->all());
        $id = DB::table('course')->insertGetId([
            'name' => $course->getName(),
            'description' => $course->getDescription(),
            'price' => $course->getPrice(),
            'duration' => $course->getDuration(),
            'school_id' => $course->getSchoolId(),
            'image' => $image_url,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'inscripcion' => $inscripcion_url
        ]);
        return $id;
    }

    /**
     * @param array $data
     * @return int
     */
    public function update(Request $request, string $image_url, string $inscripcion_url){
        $courseMapper = new CourseMapper();
        $course = $courseMapper->map($request->all());
        $id = DB::table('course')->where('id', $course->getId())->update([
            'name' => $course->getName(),
            'description' => $course->getDescription(),
            'price' => $course->getPrice(),
            'duration' => $course->getDuration(),
            'school_id' => $course->getSchoolId(),
            'image' => $image_url,
            'updated_at' => date('Y-m-d H:i:s'),
            'inscripcion' => $inscripcion_url
        ]);
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
                    ->where('name', 'like', '%'.$search.'%')
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
                    ->where('name', 'like', '%'.$search.'%')
                    ->orderBy('id', 'desc')
                    ->count();
            }else{
                $total = DB::table('course')
                    ->count();
            }
        }  
        return $total;
    }
}