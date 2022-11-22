<?php

namespace App\Http\Repository;

use App\Http\Entity\JournalEntity;
use App\Http\Mapper\JournalMapper;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class JournalRepository
{

    /**
     * @param array $data
     * @return array
     */
    public function getAll($album=0, $page=1, $search='')
    {
        $journalMapper = new JournalMapper();
        $page = ($page - 1)*10;
        if(!empty($album)){
            if(!empty($search)){
                $journal = DB::table('journal')
                    ->where('journal.album', $album)
                    ->where('journal.title', 'like', '%'.$search.'%')
                    ->orWhere('journal.description', 'like', '%'.$search.'%')
                    ->orWhere('journal.url', 'like', '%'.$search.'%')
                    ->orderBy('journal.id', 'desc')
                    ->skip($page)
                    ->take(10)
                    ->get();
            }else{
                $journal = DB::table('journal')
                    ->where('journal.album', $album)
                    ->orderBy('journal.id', 'desc')
                    ->skip($page)
                    ->take(10)
                    ->get();
            }
        }else{
            if(!empty($search)){
                $journal = DB::table('journal')
                    ->where('journal.title', 'like', '%'.$search.'%')
                    ->orWhere('journal.description', 'like', '%'.$search.'%')
                    ->orWhere('journal.url', 'like', '%'.$search.'%')
                    ->orderBy('journal.id', 'desc')
                    ->skip($page)
                    ->take(10)
                    ->get();
            }else{
                $journal = DB::table('journal')
                    ->orderBy('journal.id', 'desc')
                    ->skip($page)
                    ->take(10)
                    ->get();
            }
        }
        $journalList = $journalMapper->mapCollection($journal->toArray());
        return $journalList;
    }

    /**
     * Get journal by album
     */
    public function getByAlbum($album=''){
        //buscamos el album en la columna name de la tabla album y obtenemos su id
        if(!empty($album)){
            if($album=='todo'){
                $journals = DB::table('journal')
                    ->orderBy('journal.id', 'desc')
                    ->get();
                $journalMapper = new JournalMapper();
                $journalList = $journalMapper->mapCollection($journals->toArray()); 
                return $journalList;
            }else{
                $album_id = DB::table('album')
                ->where('album.name', $album)
                ->get();
                $album_id = $album_id[0]->id;
                $journals = DB::table('journal')
                    ->where('journal.album', $album_id)
                    ->get();
                $journalMapper = new JournalMapper();
                $journalList = $journalMapper->mapCollection($journals->toArray()); 
                return $journalList;
            }
        }else{
            return false;
        }
            
    }

    /**
     * Esta funcion obtiene el nombre de un album y el nombe en minuscula de un mes, se debe de obtener
     * el id del album y el numero de mes para poder obtener los datos de la tabla journal, tanto album como mes pueden 
     * venir con el valor "todo" el cual indica que ese campo no va a filtrar el resultado
     * @param string $album
     * @param string $month
     * @return array
     */
    public function getByAlbumNameAndMonthName($album='todo', $month='todo'){
        if($album=='todo' && $month=='todo'){
            $journals = DB::table('journal')
                ->orderBy('journal.id', 'desc')
                ->get();
            $journalMapper = new JournalMapper();
            $journalList = $journalMapper->mapCollection($journals->toArray()); 
            return $journalList;
        }else{
            if($album=='todo'){
                $month_id = DB::table('month')
                    ->where('month.name', $month)
                    ->get();
                $month_id = $month_id[0]->id;
                $journals = DB::table('journal')
                    ->where('journal.month', $month_id)
                    ->orderBy('journal.id', 'desc')
                    ->get();
                $journalMapper = new JournalMapper();
                $journalList = $journalMapper->mapCollection($journals->toArray()); 
                return $journalList;
            }else{
                if($month=='todo'){
                    $album_id = DB::table('album')
                        ->where('album.name', $album)
                        ->get();
                    $album_id = $album_id[0]->id;
                    $journals = DB::table('journal')
                        ->where('journal.album', $album_id)
                        ->orderBy('journal.id', 'desc')
                        ->get();
                    $journalMapper = new JournalMapper();
                    $journalList = $journalMapper->mapCollection($journals->toArray()); 
                    return $journalList;
                }else{
                    $album_id = DB::table('album')
                        ->where('album.name', $album)
                        ->get();
                    $album_id = $album_id[0]->id;
                    $month_id = DB::table('month')
                        ->where('month.name', $month)
                        ->get();
                    $month_id = $month_id[0]->id;
                    $journals = DB::table('journal')
                        ->where('journal.album', $album_id)
                        ->where('journal.month', $month_id)
                        ->orderBy('journal.id', 'desc')
                        ->get();
                    $journalMapper = new JournalMapper();
                    $journalList = $journalMapper->mapCollection($journals->toArray()); 
                    return $journalList;
                }
            }
        }
    }

    
    
    /**
     * @param array $filter
     * @return JournalEntity
     */
    public function getOne(int $id){
        $journalMapper = new JournalMapper();
        $journal = DB::table('journal')
            ->where('id', $id)
            ->first();
        $journal = $journalMapper->map(get_object_vars($journal));
        return $journal;
    }

    /**
     * get by id
     * @param int $id
     * @return JournalEntity
     */
    public function getById(int $id){
        $journalMapper = new JournalMapper();
        $journal = DB::table('journal')
            ->where('id', $id)
            ->first();
        $journal = $journalMapper->map(get_object_vars($journal));
        return $journal;
    }
    
    /**
     * @param array $data
     * @return int $id
     */
    public function create(Request $request, string $image, string $url){
        $journalMapper = new JournalMapper();
        $journal = $journalMapper->map($request->all());
        if($image!='' && $url!=''){
            $id = DB::table('journal')->insertGetId(
                [
                    'title' => $journal->getTitle(),
                    'description' => $journal->getDescription(),
                    'image' => $image,
                    'url' => $url,
                    'album' => $journal->getAlbum(),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]
            );
        }elseif($image!=''){
            $id = DB::table('journal')->insertGetId(
                [
                    'title' => $journal->getTitle(),
                    'description' => $journal->getDescription(),
                    'image' => $image,
                    'album' => $journal->getAlbum(),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]
            );
        }elseif($url!=''){
            $id = DB::table('journal')->insertGetId(
                [
                    'title' => $journal->getTitle(),
                    'description' => $journal->getDescription(),
                    'url' => $url,
                    'album' => $journal->getAlbum(),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]
            );
        }else{
            $id = DB::table('journal')->insertGetId(
                [
                    'title' => $journal->getTitle(),
                    'description' => $journal->getDescription(),
                    'album' => $journal->getAlbum(),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]
            );

        }
        return $id;
    }
    
    /**
     * @param array $data
     */
    public function update(Request $request, string $image, string $url){
        $journalMapper = new JournalMapper();
        $journal = $journalMapper->map($request->all());
        if($image!='' && $url!=''){
            DB::table('journal')
                ->where('id', $journal->getId())
                ->update(
                    [
                        'title' => $journal->getTitle(),
                        'description' => $journal->getDescription(),
                        'image' => $image,
                        'url' => $url,
                        'album' => $journal->getAlbum(),
                        'updated_at' => date('Y-m-d H:i:s')
                    ]
                );
        }elseif($image!=''){
            DB::table('journal')
                ->where('id', $journal->getId())
                ->update(
                    [
                        'title' => $journal->getTitle(),
                        'description' => $journal->getDescription(),
                        'image' => $image,
                        'album' => $journal->getAlbum(),
                        'updated_at' => date('Y-m-d H:i:s')
                    ]
                );
        }elseif($url!=''){
            DB::table('journal')
                ->where('id', $journal->getId())
                ->update(
                    [
                        'title' => $journal->getTitle(),
                        'description' => $journal->getDescription(),
                        'url' => $url,
                        'album' => $journal->getAlbum(),
                        'updated_at' => date('Y-m-d H:i:s')
                    ]
                );
        }else{
            DB::table('journal')
                ->where('id', $journal->getId())
                ->update(
                    [
                        'title' => $journal->getTitle(),
                        'description' => $journal->getDescription(),
                        'album' => $journal->getAlbum(),
                        'updated_at' => date('Y-m-d H:i:s')
                    ]
                );
        }
        return $journal->getId();
    }
    
    /**
     * @param array $data
     */
    public function delete(int $id){
        return DB::table('journal')
            ->where('id', $id)
            ->delete();
    }

    /**
     * Contar los registros de la tabla journal
     * @return int
     */
    public function getTotal(int $album, string $search=''){
        if(!empty($search)) {
            if(!empty($album)) {
                $total = DB::table('journal')
                    ->where('album', $album)
                    ->where('title', 'like', '%'.$search.'%')
                    ->count();
            } else {
                $total = DB::table('journal')
                    ->where('title', 'like', '%'.$search.'%')
                    ->count();
            }
        } else {
            if(!empty($album)) {
                $total = DB::table('journal')
                    ->where('album', $album)
                    ->count();
            } else {
                $total = DB::table('journal')
                    ->count();
            }
        }
        return $total;
    }
}