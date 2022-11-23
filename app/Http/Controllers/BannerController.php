<?php

namespace App\Http\Controllers;

use App\Http\Repository\BannerRepository;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function banners(string $place=''){
        $bannerRepository = new BannerRepository();
        $banners = $bannerRepository->getAll($place);
        return view('admin.banner.list', ['admin'=>['title'=>'Banners','banners'=>$banners, 'section' => 'sponsor', 'subsection' => 'banner', 'place' => $place]]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function CreateBanner(){
        return view('admin.banner.create', ['admin'=>['title'=>'Crear Banner','section' => 'journal','subsection' => 'savebanner']]);
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function EditBanner(int $id){
        $bannerRepository = new BannerRepository();
        $banner = $bannerRepository->getById($id);
        return view('admin.banner.edit', ['admin'=>['title'=>'Editar Banner', 'banner'=>$banner,'section' => 'journal','subsection' => 'savebanner']]);
    }

    /**
     * @param Request $request
     * @return int $id
     */
    public function postCreate(Request $request){
        $bannerRepository = new BannerRepository();
        $img = '';
        if(!empty($request->file('img'))){
            $image = $request->file('img');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/banners');
            $image->move($destinationPath, $name);
            $img = '/images/banners/'.$name;
        }
        if($request->input('id') != 0){
            $id = $bannerRepository->update($request->input('id'),$request,$img);
        } else {
            $id = $bannerRepository->create($request,$img);
        }
        return $id;
    }

    /**
     * Borrar banner
     * @param int $id
     * @return int $status
     */
    public function postDelete(int $id){
        $bannerRepository = new BannerRepository();
        $status = $bannerRepository->delete($id);
        return $status;
    }
    
    /**
     * @param int $id
     * @return int $status
     */
    public function postStatus(Request $request){
        $bannerRepository = new BannerRepository();
        $status = $bannerRepository->status($request->input('id'),$request->input('status'));
        return $status;
    }
}