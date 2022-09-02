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
                $journals = DB::table('journals')
                    ->where('journals.album', $album)
                    ->where('journals.title', 'like', '%'.$search.'%')
                    ->orWhere('journals.description', 'like', '%'.$search.'%')
                    ->orWhere('journals.url', 'like', '%'.$search.'%')
                    ->orderBy('journals.id', 'desc')
                    ->skip($page)
                    ->take(10)
                    ->get();
            }else{
                $journals = DB::table('journals')
                    ->where('journals.album', $album)
                    ->orderBy('journals.id', 'desc')
                    ->skip($page)
                    ->take(10)
                    ->get();
            }
        }else{
            if(!empty($search)){
                $journals = DB::table('journals')
                    ->where('journals.title', 'like', '%'.$search.'%')
                    ->orWhere('journals.description', 'like', '%'.$search.'%')
                    ->orWhere('journals.url', 'like', '%'.$search.'%')
                    ->orderBy('journals.id', 'desc')
                    ->skip($page)
                    ->take(10)
                    ->get();
            }else{
                $journals = DB::table('journals')
                    ->orderBy('journals.id', 'desc')
                    ->skip($page)
                    ->take(10)
                    ->get();
            }
        }
        
        $journalList = $journalMapper->mapCollection($journals);
        return $journalList;
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
        $journal = $journalMapper->map($journal->toArray());
        return $journal;
    }
    
    /**
     * @param array $data
     * @return int $id
     */
    public function create(Request $request, string $image, string $url){
        $journalMapper = new JournalMapper();
        $journal = $journalMapper->map($request->all());
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
        return $id;
    }
    
    /**
     * @param array $data
     */
    public function update(Request $request, string $image, string $url){
        $journalMapper = new JournalMapper();
        $journal = $journalMapper->map($request->all());
        $id = DB::table('journal')
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
        return $count;
    }
}