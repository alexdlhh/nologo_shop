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
        return view('admin.rs.list')->with(['admin'=>['title'=>'Redes Sociales','rs'=>$rs,'section' => 'rs','subsection' => 'listrs']]);
    }

    /**
     * display form to create new social media
     */
    public function create(){
        return view('admin.rs.create')->with(['admin'=>['title'=>'Redes Sociales','section' => 'rs','subsection' => 'savers']]);
    }

    /**
     * store new social media
     */
    public function postCreate(Request $request){
        $rsRepository = new RSRepository();
        $image_url = '';
        if(!empty($request->file('icon')) && $request->file('icon')!='undefined'){
            //upload image
            $image = $request->file('icon');
            //prepare image name with title without special characters and spaces
            $image_name = str_replace(' ', '', $request->input('name'));
            $image_name = preg_replace('/[^A-Za-z0-9\-]/', '', $image_name);        
            $imageName = time().$image_name.'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/social/');
            $image->move($destinationPath, $imageName);
            //change $request feature_image content to current location of image
            $image_url = '/images/social/'.$imageName;
        }
        if($request->input('id') != 0){
            $rs = $rsRepository->update($request, $image_url);
            return $request->input('id');
        }else{
            $rs = $rsRepository->create($request,$image_url);
            return $rs;
        }
        
    }

    /**
     * display form to edit social media
     */
    public function edit($id){
        $rsRepository = new RSRepository();
        $rs = $rsRepository->getById($id);
        return view('admin.rs.edit')->with(['admin'=>['title'=>'Redes Sociales','rs'=>$rs,'section' => 'rs','subsection' => 'savers']]);
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