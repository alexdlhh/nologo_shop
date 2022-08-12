<?php

namespace App\Http\Mapper;

use App\Http\Entities\RFEGEntity;

class RFEGMapper
{
    /**
     * @param array $data
     * @return RFEGEntity
     */
    public function map(array $data): RFEGEntity
    {
        /*$rfeg = new RFEGEntity();
        return $rfeg;*/
    }
    
    /**
     * @param Array $data
     * @return array
     */
    public function mapCollection(array $data): array
    {
        /*$rfegs = [];
        foreach ($data as $item) {
            $rfegs[] = $this->map($item);
        }
        return $rfegs;*/
    }
}