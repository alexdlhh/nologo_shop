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
        $journal->setId($data['id']);
        $journal->setTitle($data['title']);
        $journal->setDescription($data['description']);
        $journal->setImage($data['image']);
        $journal->setCreatedAt($data['created_at']);
        $journal->setUpdatedAt($data['updated_at']);
        $journal->setUrl($data['url']);
        return $journal;
    }
    
    /**
     * @param Array $data
     * @return array
     */
    public function mapCollection(array $data): array
    {
        $journals = [];
        foreach ($data as $item) {
            $journals[] = $this->map($item);
        }
        return $journals;
    }
}