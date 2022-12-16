<?php

namespace App\Http\Controllers;

use App\Http\Repository\AlbumRepository;
use App\Http\Repository\JournalRepository;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function albums(int $page=1, string $search=''){
        $albumRepository = new AlbumRepository();
        $albums = $albumRepository->getAll($page, $search);
        $total = $albumRepository->getTotal($search);
        $pages = ceil($total/10);
        return view('admin.album.list', ['admin'=>['title'=>'Albums','albums'=>$albums, 'search'=>$search, 'page'=>$page, 'total_pages'=>$total, 'pages'=>$pages,'section' => 'media', 'subsection' => 'listalbum']]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function CreateAlbum(){
        return view('admin.album.create', ['admin'=>['title'=>'Crear Album','section' => 'media','subsection' => 'savejournal']]);
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function EditAlbum(int $id){
        $albumRepository = new AlbumRepository();
        $album = $albumRepository->getById($id);
        return view('admin.album.edit', ['admin'=>['title'=>'Editar Album', 'album'=>$album,'section' => 'media','subsection' => 'savejournal']]);
    }

    /**
     * @param Request $request
     * @return int $id
     */
    public function postCreate(Request $request){
        $albumRepository = new AlbumRepository();
        if($request->input('id') != null){
            $id = $albumRepository->update($request,$request->input('id'));
        } else {
            $id = $albumRepository->create($request);
        }
        return $id;
    }

    /**
     * Borrar album
     * @param int $id
     * @return int $status
     */
    public function postDelete(int $id){
        $albumRepository = new AlbumRepository();
        $status = $albumRepository->delete($id);
        return $status;
    }
}
