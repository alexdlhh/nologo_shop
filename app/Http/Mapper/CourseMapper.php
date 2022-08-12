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
        $course->setId($data['id']);
        $course->setName($data['name']);
        $course->setDescription($data['description']);
        $course->setPrice($data['price']);
        $course->setCreatedAt($data['created_at']);
        $course->setUpdatedAt($data['updated_at']);
        $course->setDeletedAt($data['deleted_at']);
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
            $courses[] = $this->map($item);
        }
        return $courses;
    }
}