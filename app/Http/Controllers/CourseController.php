<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Repository\SchoolRepository;
use App\Http\Repository\CourseRepository;
use App\Http\Repository\PagesRepository;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function courses(int $school_id=0, int $page=1, string $search='')
    {
        $courseRepository = new CourseRepository();
        $courses = $courseRepository->getAll($school_id,$page,$search);
        $total_courses = $courseRepository->getTotalCourses($school_id,$page,$search);
        $total_pages = ceil($total_courses/10);
        $schoolRepository = new SchoolRepository();
        $school = $schoolRepository->getAll();
        $school_name = [];
        foreach($school as $s){
            $school_name[$s->id] = $s->name;
        }
        return view('admin.courses.list')->with(['admin'=>['courses'=>$courses, 'title'=>'Cursos', 'search'=>$search, 'total_courses'=>$total_courses, 'total_pages'=>$total_pages, 'page'=>$page, 'school_id'=>$school_id, 'school_name'=>$school_name, 'schools'=>$school,'section' => 'school','subsection' => 'listcourses']]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createCourse(){
        $schoolRepository = new SchoolRepository();
        $schools = $schoolRepository->getAll();
        return view('admin.courses.create')->with(['admin'=>['title'=>'Crear Curso', 'schools'=>$schools,'section' => 'school',   'subsection' => 'savecourse']]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return int $id
     */
    public function postCreate(Request $request)
    {
        $courseRepository = new CourseRepository();
        $image_url='';
        $inscripcion_url='';
        //upload image
        if(!empty($request->file('image'))){
            $image = $request->file('image');
            //prepare image name with title without special characters and spaces
            $image_name = str_replace(' ', '', $request->input('name'));
            $image_name = preg_replace('/[^A-Za-z0-9\-]/', '', $image_name);        
            $imageName = time().$image_name.'.'.$image->getClientOriginalExtension();
            $destinationPath=public_path('/images/course/');
            $image->move($destinationPath, $imageName);
            //change $request feature_image content to current location of image
            $image_url = '/images/course/'.$imageName;
            $request->input('image', $image_url);
        }else{
            if(!empty($request->input('old_image'))){
                $image_url = $request->input('old_image');
            }
        }
        if(!empty($request->file('inscripcion'))){
            $inscripcion = $request->file('inscripcion');
            //prepare inscripcion name with title without special characters and spaces
            $inscripcion_name = str_replace(' ', '', $request->input('name'));
            $inscripcion_name = preg_replace('/[^A-Za-z0-9\-]/', '', $inscripcion_name);        
            $inscripcionName = time().$inscripcion_name.'.'.$inscripcion->getClientOriginalExtension();
            $destinationPath=public_path('/inscripcions/course/');
            $inscripcion->move($destinationPath, $inscripcionName);
            //change $request feature_inscripcion content to current location of inscripcion
            $inscripcion_url = '/files/fomularios/'.$inscripcionName;
            $request->input('inscripcion', $inscripcion_url);
        }else{
            if(!empty($request->input('old_inscripcion'))){
                $inscripcion_url = $request->input('old_inscripcion');
            }
        }
        if($request->input('id')==0){
            $id = $courseRepository->create($request,$image_url,$inscripcion_url);
        } else {
            $id = $courseRepository->update($request,$image_url,$inscripcion_url);
        }
        return $id;
    }

    /**
     * Edit the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $courseRepository = new CourseRepository();
        $course = $courseRepository->getOne($id);
        $schoolRepository = new SchoolRepository();
        $schools = $schoolRepository->getAll();
        return view('admin.courses.edit')->with(['admin'=>['title'=>'Editar Curso', 'course'=>$course, 'schools'=>$schools,'section' => 'school',
        'subsection' => 'savecourse']]);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return int $status
     */
    public function postDelete($id){
        $courseRepository = new CourseRepository();
        $status = $courseRepository->delete($id);
        return $status;
    }
}