<?php

namespace App\Http\Controllers\Pages;

use App\Http\Repository\PagesRepository;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the web HomePage.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageRepository = new PagesRepository();
        $headers = $pageRepository->getAll('section','=','1');
        return view('pages.home')->with('headers',$headers);
    }
}
