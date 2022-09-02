<?php

namespace App\Http\Mapper;

use App\Http\Entity\JournalEntity;

class JournalMapper
{
    /**
     * @param array $data
     * @return JournalEntity
     */
    public function map(array $data): JournalEntity
    {
        $journal = new JournalEntity();
        !empty($data['id']) ? $journal->setId($data['id']) : null;
        !empty($data['title']) ? $journal->setTitle($data['title']) : null;
        !empty($data['description']) ? $journal->setDescription($data['description']) : null;
        !empty($data['image']) ? $journal->setImage($data['image']) : null;
        !empty($data['created_at']) ? $journal->setCreatedAt($data['created_at']) : null;
        !empty($data['updated_at']) ? $journal->setUpdatedAt($data['updated_at']) : null;
        !empty($data['url']) ? $journal->setUrl($data['url']) : null;
        !empty($data['album']) ? $journal->setAlbum($data['album']) : null;
        return $journal;
    }
    
    /**
     * @param Array $data
     * @return array
     */
    public function mapCollection($data): array
    {
        $journals = [];
        foreach ($data as $item) {
            if(is_array($item)) {
                $journals[] = $this->map($item);
            }else{
                $journals[] = $this->map(get_object_vars($item));
            }
        }
        return $journals;
    }
}