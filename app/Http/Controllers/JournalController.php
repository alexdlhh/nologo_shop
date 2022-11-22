<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Repository\JournalRepository;
use App\Http\Repository\PagesRepository;
use App\Http\Repository\AlbumRepository;
use App\Http\Repository\RSRepository;
use App\Http\Repository\SponsorRepository;
use App\Http\Repository\NewsRepository;

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
        $journals = $journalRepository->getAll($album,$page,$search);
        $total = $journalRepository->getTotal($album,$search);
        $albums = $albumRepository->getAll(0,'');
        $pages = ceil($total/10);

        return view('admin.journal.list', ['admin'=>['title'=>'Revistas','albums'=>$albums,'album'=>$album,'journals'=>$journals, 'search'=>$search, 'page'=>$page, 'total_pages'=>$total, 'pages'=>$pages,'section' => 'jorunal','subsection' => 'listjournal']]);
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
            $image_name = time().$image_name.'.'.$image->getClientOriginalExtension();
            $destinationPath=public_path('/images/journal/');
            $image->move($destinationPath, $image_name);
            //change $request feature_image content to current location of image
            $image = '/images/journal/'.$image_name;
            $request->input('image', $image);
        }
        if(!empty($request->file('url_file'))){
            $url = $request->file('url_file');
            //prepare image name with title without special characters and spaces
            $url_name = str_replace(' ', '', $request->input('title'));
            $url_name = preg_replace('/[^A-Za-z0-9\-]/', '', $url_name);        
            $url_name = time().$url_name.'.'.$url->getClientOriginalExtension();
            $destinationPath=public_path('/files/journal/');
            $url->move($destinationPath, $url_name);
            //change $request feature_image content to current location of image
            $url = '/files/journal/'.$url_name;
            $request->input('url_file', $url);
        }
        if($request->input('id') == 0){
            $id = $journalRepository->create($request, $image, $url);
        }else{
            $id = $journalRepository->update($request, $image, $url);
        }
        return $id;
    }

    /**
     * @param int $id
     * @return int $id
     */
    public function postDelete(int $id){
        $journalRepository = new JournalRepository();
        $journalRepository->delete($id);
        return $id;
    }

    /**
     * Vista de la front Page
     */
    public function frontPageRevista($menu1='todo', $menu2='todo'){
        //$common = new Common();
        $pageRepository = new PagesRepository();
        $newRepository = new NewsRepository();
        $RSRepository = new RSRepository();
        $sponsorRepository = new SponsorRepository();
        $albumRepository = new AlbumRepository();
        $journalRepository = new JournalRepository();
        $journals = $journalRepository->getByAlbum($menu1, $menu2);
        $news = $newRepository->getNews(5);
        $headers = $this->header_order($pageRepository->getAll('section','=','1'));
        $rs = $RSRepository->getAll();
        $sponsors = $sponsorRepository->getAll();
        $albums = $albumRepository->getAll(0,'');

        $front = [
            'headers' => $headers,
            'section' => '/media',
            'news' => $news,
            'rs' => $rs,
            'sponsors' => $sponsors,
            'subsection' => 'especialidades',
            'title'=>'Revistas',
            'journals' => $journals,
            'albums' => $albums,
            'menu1' => $menu1,
            'menu2' => $menu2,
        ];
        return view('pages.revista')->with('front',$front);
    }

    public function header_order($headers){
        $order = [];
        $aux = [];
        foreach($headers as $_link){
            $order[$_link->getOrder()] = $_link;
        }
        for($i = 1; $i <= count($order); $i++){
            $aux[] = $order[$i];
        }
        return $aux;
    }
}
