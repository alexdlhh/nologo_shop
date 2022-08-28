<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repository\SchoolRepository;
use App\Http\Repository\PagesRepository;

class CategoryNewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function schools(int $page=1, string $search='')
    {
        $schoolRepository = new SchoolRepository();
        $schools = $schoolRepository->getAll($search);
        $total_schools = $schoolRepository->getTotalSchools($page,$search);
        $total_pages = ceil($total_schools/10);
        $pagesRepository = new PagesRepository();
        $pages = $pagesRepository->getAll();
        return view('admin.school.list')->with(['admin'=>['schools'=>$schools, 'pages'=>$pages, 'title'=>'Escuelas', 'search'=>$search, 'total_schools'=>$total_schools, 'total_pages'=>$total_pages, 'page'=>$page]]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createSchool(){
        $pagesRepository = new PagesRepository();
        $pages = $pagesRepository->getAll();
        return view('admin.schools.create')->with(['admin'=>['pages'=>$pages, 'title'=>'Crear Escuela']]);
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
        return $schoolRepository->create($request);
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
        $pagesRepository = new PagesRepository();
        $pages = $pagesRepository->getAll();
        return view('admin.schools.edit')->with(['admin'=>['school'=>$school, 'pages'=>$pages, 'title'=>'Editar Escuela']]);
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