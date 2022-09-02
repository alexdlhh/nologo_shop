<?php

namespace App\Http\Controllers;

use App\Http\Repository\SponsorRepository;
use Illuminate\Http\Request;
use App\Http\Repository\PagesRepository;

class SponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sponsors()
    {
        $sponsorRepository = new SponsorRepository();
        $sponsors = $sponsorRepository->getAll();
        return view('admin.sponsors.list')->with('admin',[
            'title' => 'Listado de Sponsors',
            'sponsors' => $sponsors,
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
        $sponsorRepository = new SponsorRepository();
        $image_url= '';
        if(!empty($request->input('image'))){
            $image = $request->input('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/sponsors'), $imageName);
            $image_url = 'images/sponsors/'.$imageName;
        }
        if($request->id == 0){
            $id = $sponsorRepository->create($request,$image_url);
        } else {
            $id = $sponsorRepository->update($request,$request->id,$image_url);
        }
        
        return $id;
    }
    
    /**
     * Delete a newly created resource in storage.
     */
    public function postDelete(int $id)
    {
        $sponsorRepository = new SponsorRepository();
        $sponsorRepository->delete($id);
        return true;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createSponsor()
    {
        $pagesRepository = new PagesRepository();
        $pages = $pagesRepository->getAll();
        return view('admin.sponsors.create')->with('admin',[
            'title' => 'Crear Sponsor',
            'pages' => $pages,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editSponsor(int $id)
    {
        $sponsorRepository = new SponsorRepository();
        $sponsor = $sponsorRepository->getOne($id);
        $pagesRepository = new PagesRepository();
        $pages = $pagesRepository->getAll();
        return view('admin.sponsors.edit')->with('admin',[
            'title' => 'Editar Sponsor',
            'sponsor' => $sponsor,
            'pages' => $pages,
        ]);
    }
}