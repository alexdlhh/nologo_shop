<?php

namespace App\Http\Controllers\Pages;

use App\Http\Repository\PagesRepository;
use App\Http\Helpers\Common;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Repository\NewsRepository;

class HomeController extends Controller
{
    /**
     * Show the web HomePage.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $common = new Common();
        $pageRepository = new PagesRepository();
        $newRepository = new NewsRepository();
        $news = $newRepository->getNews(5);
        $headers = $common->header_order($pageRepository->getAll('section','=','1'));
        $front = [
            'headers' => $headers,
            'section' => 'RFEG',
            'news' => $news
        ];
        return view('pages.home')->with('front',$front);
    }
}
