<?php

namespace App\Http\Repository;

use App\Http\Entity\SchoolEntity;
use App\Http\Mapper\SchoolMapper;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SchoolRepository
{

    /**
     * @param array $data
     * @return array
     */
    public function getAll($page=1,$search='')
    {
        $schoolMapper = new SchoolMapper();
        $init = $page==1?0:($page-1)*10;
        if(!empty($search)) {
            $schools = DB::table('school')
                ->where('name', 'like', '%'.$search.'%')
                ->skip($init)->take(10)->get();
        } else {
            $schools = DB::table('school')
                ->skip($init)->take(10)->get();
        }
        $schoolList = $schoolMapper->mapCollection($schools->toArray());
        return $schoolList;
    }
    
    /**
     * @param array $filter
     * @return SchoolEntity
     */
    public function getOne($id){
        $schoolMapper = new SchoolMapper();
        $school = DB::table('school')
            ->where('id', $id)
            ->first();
        $school = $schoolMapper->map(get_object_vars($school));
        return $school;
    }
    
    /**
     * @param array $data
     * @return bool
     */
    public function create(Request $request,String $image){
        $schoolMapper = new SchoolMapper();
        $school = $schoolMapper->map($request->all());
        $id = DB::table('school')->insertGetId([
            'name' => $school->getName(),
            'address' => $school->getAddress(),
            'phone' => $school->getPhone(),
            'email' => $school->getEmail(),
            'website' => $school->getWebsite(),
            'logo' => $image,
            'description' => $school->getDescription(),
            'created_at' => $school->getCreatedAt(),
            'updated_at' => $school->getUpdatedAt(),
            'status' => $school->getStatus()?1:0
        ]);
        return $id;
    }
    
    /**
     * @param array $data
     * @return int
     */
    public function update(Request $request, String $image){
        $schoolMapper = new SchoolMapper();
        $school = $schoolMapper->map($request->all());
        $id = DB::table('school')->where('id', $school->getId())->update([
            'name' => $school->getName(),
            'address' => $school->getAddress(),
            'phone' => $school->getPhone(),
            'email' => $school->getEmail(),
            'website' => $school->getWebsite(),
            'logo' => $image,
            'description' => $school->getDescription(),
            'updated_at' => $school->getUpdatedAt(),
            'status' => $school->getStatus()?1:0
        ]);
        return $id;
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id){
        $id = DB::table('school')->where('id', $id)->delete();
        return true;
    }

    /**
     * @param array $data
     * @return bool
     */
    public function updateStatus(Request $request){
        $schoolMapper = new SchoolMapper();
        $school = $schoolMapper->map($request->all());
        $id = DB::table('school')->where('id', $school->getId())->update([
            'status' => $school->getStatus()?1:0
        ]);
        return true;
    }

    /**
     * @param array $data
     * @return bool
     */
    public function getTotalSchools($search=''){
        if(!empty($search)) {
            $total = DB::table('school')
                ->where('name', 'like', '%'.$search.'%')
                ->count();
        } else {
            $total = DB::table('school')
                ->count();
        }
        return $total;
    }

}