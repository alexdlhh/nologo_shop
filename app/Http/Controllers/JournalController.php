<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Repository\JournalRepository;
use App\Http\Repository\PagesRepository;
use App\Http\Repository\AlbumRepository;

class JournalController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function journals(int $album=0,int $page=1, string $search='')
    {
        $journalRepository = new JournalRepository();
        $albumRepository = new AlbumRepository();
        $journals = $journalRepository->getAll($album,$page, $search);
        $total = $journalRepository->getTotal($album,$search);
        $albums = $albumRepository->getAll(0,'');
        $pages = ceil($total/10);

        return view('admin.journal.list', ['admin'=>['title'=>'Revistas','albums'=>$albums,'journals'=>$journals, 'search'=>$search, 'page'=>$page, 'total_pages'=>$total, 'pages'=>$pages,'section' => 'jorunal','subsection' => 'listjournal']]);
    }
    
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function CreateJournal()
    {
        $albumRepository = new AlbumRepository();
        $albums = $albumRepository->getAll(0,'');
        return view('admin.journal.create', ['admin'=>['title'=>'Crear Revista','albums'=>$albums,'section' => 'journal','subsection' => 'savejournal']]);
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function EditJournal(int $id)
    {
        $journalRepository = new JournalRepository();
        $journal = $journalRepository->getById($id);
        $albumRepository = new AlbumRepository();
        $albums = $albumRepository->getAll(0,'');
        return view('admin.journal.edit', ['admin'=>['title'=>'Editar Revista', 'journal'=>$journal,'albums'=>$albums,'section' => 'journal','subsection' => 'savejournal']]);
    }

    /**
     * @param Request $request
     * @return int $id
     */
    public function postCreate(Request $request){
        $journalRepository = new JournalRepository();
        $image = '';
        $url = '';
        if(!empty($request->file('image'))){
            $image = $request->file('image');
            //prepare image name with title without special characters and spaces
            $image_name = str_replace(' ', '', $request->input('name'));
            $image_name = preg_replace('/[^A-Za-z0-9\-]/', '', $image_name);        
            $image = time().$image_name.'.'.$image->getClientOriginalExtension();
            $destinationPath=public_path('/images/employee/');
            $image->move($destinationPath, $image);
            //change $request feature_image content to current location of image
            $image = '/images/employee/'.$image;
            $request->input('image', $image);
        }else{
            if(!empty($request->input('old_image'))){
                $image = $request->input('old_image');
            }
        }
        if(!empty($request->file('url'))){
            $url = $request->file('url');
            //prepare image name with title without special characters and spaces
            $url_name = str_replace(' ', '', $request->input('name'));
            $url_name = preg_replace('/[^A-Za-z0-9\-]/', '', $url_name);        
            $url = time().$url_name.'.'.$url->getClientOriginalExtension();
            $destinationPath=public_path('/files/journal/');
            $url->move($destinationPath, $url);
            //change $request feature_image content to current location of image
            $url = '/files/journal/'.$url;
            $request->input('url', $url);
        }else{
            if(!empty($request->input('old_url'))){
                $url = $request->input('old_url');
            }
        }
        if($request->input('id') == 0){
            $id = $journalRepository->create($request->all(), $image, $url);
        }else{
            $id = $journalRepository->update($request->all(), $image, $url);
        }
        return $id;
    }

    /**
     * @param int $id
     * @return int $id
     */
    public function delete(int $id){
        $journalRepository = new JournalRepository();
        $journalRepository->delete($id);
        return $id;
    }
}
