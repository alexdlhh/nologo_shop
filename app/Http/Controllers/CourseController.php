<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Repository\CourseRepository;
use App\Http\Repository\PagesRepository;
use App\Http\Repository\RFEGTitleRepository;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function courses(string $type='')
    {
        $rfegTitleRepository = new RFEGTitleRepository();
        $courseRepository = new CourseRepository();
        $courses = $courseRepository->getAll($type);
        $rfeg_title = $rfegTitleRepository->getStatic('cursos');
        return view('admin.courses.list')->with(['admin'=>['courses'=>$courses, 'title'=>'Cursos', 'section' => 'school','subsection' => 'listcourses', 'rfeg_title'=>$rfeg_title]]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createCourse(){
        return view('admin.courses.create')->with(['admin'=>['title'=>'Crear Curso','section' => 'school', 'subsection' => 'listcourses']]);
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
        $convocatoria_url='';
        $inscripcion_url='';
        $formularios_url='';
        //upload image
        if(!empty($request->file('convocatoria_pdf'))){
            $convocatoria = $request->file('convocatoria_pdf');
            //prepare convocatoria name with title without special characters and spaces
            $convocatoria_name = str_replace(' ', '', $request->input('name'));
            $convocatoria_name = preg_replace('/[^A-Za-z0-9\-]/', '', $convocatoria_name);        
            $convocatoriaName = time().$convocatoria_name.'_conv.'.$convocatoria->getClientOriginalExtension();
            $destinationPath=public_path('/files/course/');
            $convocatoria->move($destinationPath, $convocatoriaName);
            //change $request feature_convocatoria content to current location of convocatoria
            $convocatoria_url = '/files/course/'.$convocatoriaName;
            $request->input('convocatoria_pdf', $convocatoria_url);
        }
        if(!empty($request->file('inscripcion_pdf'))){
            $inscripcion = $request->file('inscripcion_pdf');
            //prepare inscripcion name with title without special characters and spaces
            $inscripcion_name = str_replace(' ', '', $request->input('name'));
            $inscripcion_name = preg_replace('/[^A-Za-z0-9\-]/', '', $inscripcion_name);        
            $inscripcionName = time().$inscripcion_name.'_insc.'.$inscripcion->getClientOriginalExtension();
            $destinationPath=public_path('/inscripcions/course/');
            $inscripcion->move($destinationPath, $inscripcionName);
            //change $request feature_inscripcion content to current location of inscripcion
            $inscripcion_url = '/files/fomularios/'.$inscripcionName;
            $request->input('inscripcion', $inscripcion_url);
        }
        if(!empty($request->file('formularios_pdf'))){
            $formularios = $request->file('formularios_pdf');
            //prepare formularios name with title without special characters and spaces
            $formularios_name = str_replace(' ', '', $request->input('name'));
            $formularios_name = preg_replace('/[^A-Za-z0-9\-]/', '', $formularios_name);        
            $formulariosName = time().$formularios_name.'_form.'.$formularios->getClientOriginalExtension();
            $destinationPath=public_path('/formularioss/course/');
            $formularios->move($destinationPath, $formulariosName);
            //change $request feature_formularios content to current location of formularios
            $formularios_url = '/files/fomularios/'.$formulariosName;
            $request->input('formularios', $formularios_url);
        }
        if($request->input('id')==0){
            $id = $courseRepository->create($request,$convocatoria_url,$inscripcion_url,$formularios_url);
        } else {
            $id = $courseRepository->update($request,$convocatoria_url,$inscripcion_url,$formularios_url);
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
        return view('admin.courses.edit')->with(['admin'=>['title'=>'Editar Curso', 'course'=>$course, 'section' => 'school',
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