<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repository\TagNewRepository;
use App\Http\Repository\PagesRepository;

class TagNewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tagNewRepository = new TagNewRepository();
        $tagNew = $tagNewRepository->getAll();
        return view('admin.tagsNew.list')->with('admin',[
            'title' => 'Listado de Tags',
            'tags' => $tagNew,
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
        $tagNewRepository = new TagNewRepository();
        $id = $tagNewRepository->create($request->all());
        return $id;
    }
}