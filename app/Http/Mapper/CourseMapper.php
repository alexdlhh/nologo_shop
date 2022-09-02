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
        !empty($data['name']) ? $course->setName($data['name']) : null;
        !empty($data['description']) ? $course->setDescription($data['description']) : null;
        !empty($data['price']) ? $course->setPrice($data['price']) : null;
        !empty($data['duration']) ? $course->setDuration($data['duration']) : null;
        !empty($data['image']) ? $course->setImage($data['image']) : null;
        !empty($data['created_at']) ? $course->setCreatedAt($data['created_at']) : null;
        !empty($data['updated_at']) ? $course->setUpdatedAt($data['updated_at']) : null;
        !empty($data['school_id']) ? $course->setSchoolId($data['school_id']) : null;
        !empty($data['inscripcion']) ? $course->setInscripcion($data['inscripcion']) : null;
        return $course;
    }

    /**
     * @param Array $data
     * @return array
     */
    public function mapCollection(array $data): array
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