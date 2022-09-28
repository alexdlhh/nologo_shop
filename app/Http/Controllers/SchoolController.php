<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repository\SchoolRepository;
use App\Http\Repository\CourseRepository;
use App\Http\Repository\PagesRepository;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function schools(int $page=1, string $search='')
    {
        $schoolRepository = new SchoolRepository();
        $schools = $schoolRepository->getAll($page,$search);
        $total_schools = $schoolRepository->getTotalSchools($page,$search);
        $total_pages = ceil($total_schools/10);
        return view('admin.schools.list')->with(['admin'=>['schools'=>$schools, 'title'=>'Escuelas', 'search'=>$search, 'total_schools'=>$total_schools, 'total_pages'=>$total_pages, 'page'=>$page,'section' => 'school','subsection' => 'listschool']]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createSchool(){
        return view('admin.schools.create')->with(['admin'=>['title'=>'Crear Escuela','section' => 'school','subsection' => 'saveschool']]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return int $id
     */
    public function postCreate(Request $request)
    {
        $schoolRepository = new SchoolRepository();
        $image_url='';
        //upload image
        if(!empty($request->file('logo'))){
            $image = $request->file('logo');
            //prepare image name with title without special characters and spaces
            $image_name = str_replace(' ', '', $request->input('name'));
            $image_name = preg_replace('/[^A-Za-z0-9\-]/', '', $image_name);        
            $imageName = time().$image_name.'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/school/');
            $image->move($destinationPath, $imageName);
            //change $request feature_image content to current location of image
            $image_url = '/images/school/'.$imageName;
            $request->input('logo', $image_url);
        }
        if($request->input('id')==0){
            $id = $schoolRepository->create($request,$image_url);
        } else {
            $id = $schoolRepository->update($request,$image_url);
        }
        return $id;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editSchool($id){
        $schoolRepository = new SchoolRepository();
        $school = $schoolRepository->getOne(['id'=>$id]);
        $courses = new CourseRepository();
        return view('admin.schools.edit')->with(['admin'=>['school'=>$school, 'title'=>'Editar Escuela','section' => 'school','subsection' => 'saveschool']]);
    }

    /**
     * Delete the specified resource from storage.
     * @param  int  $id
     * @return int $status
     */
    public function postDelete($id){
        $schoolRepository = new SchoolRepository();
        return $schoolRepository->delete($id);
    }

    /**
     * Update the status of the specified resource in storage.
     * @param  int  $id
     * @return int $status
     */
    public function postStatus(Request $request){
        $schoolRepository = new SchoolRepository();
        return $schoolRepository->updateStatus($request);
    }
}