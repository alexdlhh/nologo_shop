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
        $categoryNewRepository->getAll();
        return view('admin.categoriesNew.list')->with('admin',[
            'title' => 'Listado de Categorias',
            'categories' => $categoryNew,
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
        $id = $categoryNewRepository->create($request->all());
        return $id;
    }
}