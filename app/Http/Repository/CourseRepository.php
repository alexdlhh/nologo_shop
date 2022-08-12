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
    public function getAll($filter = [])
    {
        $courseMapper = new CourseMapper();

        if(!empty($filter)) {
            $courses = DB::table('courses')
                ->where($filter)
                ->get();
        } else {
            $courses = DB::table('courses')
                ->get();
        }
        
        $courseList = $courseMapper->mapCollection($courses);
        return $courseList;
    }

    /**
     * @param array $filter
     * @return CourseEntity
     */
    public function getOne($filter = []){
        $courseMapper = new CourseMapper();
        $course = DB::table('courses')
            ->where($filter)
            ->first();
        $course = $courseMapper->map($course);
        return $course;
    }

    /**
     * @param array $data
     * @return bool
     */
    public function create(Request $request){
        $courseMapper = new CourseMapper();
        $course = $courseMapper->map($request->all());
        $course->save();
        return true;
    }

    /**
     * @param array $data
     * @return bool
     */
    public function update(Request $request){
        $courseMapper = new CourseMapper();
        $course = $courseMapper->map($request->all());
        $course->save();
        return true;
    }

    /**
     * @param array $data
     * @return bool
     */
    public function delete(Request $request){
        $course = DB::table('courses')
            ->where('id', $request->id)
            ->delete();
        return true;
    }
}