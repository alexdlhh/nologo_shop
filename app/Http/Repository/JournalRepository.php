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
    public function getAll($filter = [])
    {
        $journalMapper = new JournalMapper();
    
        if(!empty($filter)) {
            $journals = DB::table('journals')
                ->where($filter)
                ->get();
        } else {
            $journals = DB::table('journals')
                ->get();
        }
        
        $journalList = $journalMapper->mapCollection($journals);
        return $journalList;
    }
    
    /**
     * @param array $filter
     * @return JournalEntity
     */
    public function getOne($filter = []){
        $journalMapper = new JournalMapper();
        $journal = DB::table('journals')
            ->where($filter)
            ->first();
        $journal = $journalMapper->map($journal);
        return $journal;
    }
    
    /**
     * @param array $data
     * @return bool
     */
    public function create(Request $request){
        $journalMapper = new JournalMapper();
        $journal = $journalMapper->map($request->all());
        $journal->save();
        return true;
    }
    
    /**
     * @param array $data
     */
    public function update(Request $request){
        $journalMapper = new JournalMapper();
        $journal = $journalMapper->map($request->all());
        $journal->save();
    }
    
    /**
     * @param array $data
     */
    public function delete(Request $request){
        $journalMapper = new JournalMapper();
        $journal = $journalMapper->map($request->all());
        $journal->delete();
    }
}