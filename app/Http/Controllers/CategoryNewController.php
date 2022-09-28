<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repository\CategoryNewRepository;
use App\Http\Repository\PagesRepository;

class CategoryNewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryNewRepository = new CategoryNewRepository();
        $categoryNew=$categoryNewRepository->getAll();
        return view('admin.categoriesNew.list')->with('admin',[
            'title' => 'Listado de Categorias',
            'categories' => $categoryNew,
            'section' => 'news',
            'subsection' => 'cat'
        ]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return int $id
     */
    public function postCreate(Request $request)
    {
        $categoryNewRepository = new CategoryNewRepository();
        if($request->id == 0){
            $id = $categoryNewRepository->create($request);
        } else {
            $id = $categoryNewRepository->update($request);
        }
        
        return $id;
    }

    /**
     * Delete a newly created resource in storage.
     */
    public function postDelete(Request $request)
    {
        $categoryNewRepository = new CategoryNewRepository();
        $categoryNewRepository->delete($request);
        return true;
    }
}