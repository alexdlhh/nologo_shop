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
        return view('admin.sponsor.list')->with('admin',[
            'title' => 'Listado de Sponsors',
            'sponsors' => $sponsors,
            'section' => 'sponsor',
            'subsection' => 'listsponsor'
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
        $image_white= '';
        if(!empty($request->file('image'))){
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('/images/sponsors'), $imageName);
            $image_url = '/images/sponsors/'.$imageName;
        }
        if(!empty($request->file('white'))){
            $image = $request->file('white');
            $imageName = time().'_white.'.$image->getClientOriginalExtension();
            $image->move(public_path('/images/sponsors'), $imageName);
            $image_white = '/images/sponsors/'.$imageName;
        }
        if($request->id == 0){
            $id = $sponsorRepository->create($request,$image_url,$image_white);
        } else {
            $id = $sponsorRepository->update($request,$request->id,$image_url,$image_white);
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
        return view('admin.sponsor.create')->with('admin',[
            'title' => 'Crear Sponsor',
            'pages' => $pages,
            'section' => 'sponsor',
            'subsection' => 'savesponsor'
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
        return view('admin.sponsor.edit')->with('admin',[
            'title' => 'Editar Sponsor',
            'sponsor' => $sponsor,
            'pages' => $pages,
            'section' => 'sponsor',
            'subsection' => 'savesponsor'
        ]);
    }
}