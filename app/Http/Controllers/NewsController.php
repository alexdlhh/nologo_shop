<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repository\PagesRepository;
use App\Http\Repository\NewsRepository;

class NewsController extends Controller
{
    /**
     * Display a listing of News.
     * @return \Illuminate\Http\Response
     */
    public function news_list(){
        $newsRepository = new NewsRepository();
        $news = $newsRepository->getAll();
        return view('admin.news.list')->with('admin',[
            'title' => 'Listado de Noticias',
            'news' => $news,
        ]);
    }

    /**
     * Show the form for creating a new News.
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('admin.news.create')->with('admin',[
            'title' => 'Crear Noticia',
        ]);
    }

    /**
     * Store a newly created News in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return int $id
     */
    public function postCreate(Request $request){
        $newsRepository = new NewsRepository();
        //upload image
        $image = $request->file('feature_image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $imageName);
        //change $request feature_image content to current location of image
        $image_url = '/images/'.$imageName;
        //create news
        $id = $newsRepository->create($request->all(), $image_url);
        return $id;
    }
}
