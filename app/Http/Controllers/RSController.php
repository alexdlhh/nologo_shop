<?php

namespace App\Http\Controllers;

use App\Http\Repository\RSRepository;
use Illuminate\Http\Request;

class RSController extends Controller
{
    /**
     * display all social media
     */
    public function rs(){
        $rsRepository = new RSRepository();
        $rs = $rsRepository->getAll();
        return view('admin.rs.list')->with(['admin'=>['title'=>'Redes Sociales','rs'=>$rs]]);
    }

    /**
     * display form to create new social media
     */
    public function create(){
        return view('admin.rs.create');
    }

    /**
     * store new social media
     */
    public function store(Request $request){
        $rsRepository = new RSRepository();
        $rs = $rsRepository->create($request->all());
        return $rs;
    }

    /**
     * display form to edit social media
     */
    public function edit($id){
        $rsRepository = new RSRepository();
        $rs = $rsRepository->getById($id);
        return view('admin.rs.edit')->with(['admin'=>['title'=>'Redes Sociales','rs'=>$rs]]);
    }

    /**
     * update social media
     */
    public function update(Request $request, $id){
        $rsRepository = new RSRepository();
        $rs = $rsRepository->update($request->all(), $id);
        return $rs;
    }

    /**
     * delete social media
     */
    public function delete($id){
        $rsRepository = new RSRepository();
        $rs = $rsRepository->delete($id);
        return $rs;
    }
}