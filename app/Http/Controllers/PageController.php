<?php
namespace App\Http\Controllers;

use App\Http\Mapper\PagesMapper;
use App\Http\Repository\PagesRepository;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * @var PagesRepository
     */
    private $pagesRepository;

    /**
     * PagesController constructor.
     * @param PagesRepository $pagesRepository
     */
    public function __construct(PagesRepository $pagesRepository)
    {
        $this->pagesRepository = $pagesRepository;
    }

    /**
     * @param Request $request
     * @return View
     */
    public function getAll(Request $request)
    {
        $page = $request->get('page');
        $search = $request->get('search');
        $pages = $this->pagesRepository->getAll();
        return view('admin.pages.list', ['admin'=>['title'=>'Albums','pages'=>$pages]]);
    }

    /**
     * @return View
     */
    public function edit(Request $request){
        $id = $request->get('id');
        $pages = $this->pagesRepository->getOne(['id' => $id]);
        return view('admin.pages.edit', ['admin'=>['title'=>'Albums','pages'=>$pages]]);
    }
    /**
     * @return View
     */
    public function create(Request $request){
        $pages = $this->pagesRepository->create($request);
        return view('admin.pages.create', ['admin'=>['title'=>'Albums','pages'=>$pages]]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getOne(Request $request)
    {
        $id = $request->get('id');
        $pages = $this->pagesRepository->getOne(['id' => $id]);
        return response()->json($pages);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        $id = $this->pagesRepository->update($request);
        return response()->json(['id' => $id]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function save(Request $request)
    {
        $id = $this->pagesRepository->create($request);
        return response()->json(['id' => $id]);
    }
}