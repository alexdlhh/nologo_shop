<?php

namespace App\Http\Entity;

class SchoolEntity{
    public $id;
    public $documento;
    public $created_at;
    public $updated_at;
    public $download_pdf;
    public $type;
    public $active;

    public function __construct(){
        $this->id = 0;
        $this->documento = '';
        $this->created_at = date('Y-m-d H:i:s');
        $this->updated_at = date('Y-m-d H:i:s');
        $this->download_pdf = '';
        $this->type = '';
        $this->active = 0;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getDocumento(){
        return $this->documento;
    }

    public function setDocumento($documento){
        $this->documento = $documento;
    }

    public function getCreatedAt(){
        return $this->created_at;
    }

    public function setCreatedAt($created_at){
        $this->created_at = $created_at;
    }

    public function getUpdatedAt(){
        return $this->updated_at;
    }

    public function setUpdatedAt($updated_at){
        $this->updated_at = $updated_at;
    }

    public function getDownloadPdf(){
        return $this->download_pdf;
    }

    public function setDownloadPdf($download_pdf){
        $this->download_pdf = $download_pdf;
    }

    public function getType(){
        return $this->type;
    }

    public function setType($type){
        $this->type = $type;
    }

    public function getActive(){
        return $this->active;
    }

    public function setActive($active){
        $this->active = $active;
    }

    public function toArray(){
        return [
            'id' => $this->getId(),
            'documento' => $this->getDocumento(),
            'created_at' => $this->getCreatedAt(),
            'updated_at' => $this->getUpdatedAt(),
            'download_pdf' => $this->getDownloadPdf(),
            'type' => $this->getType(),
            'active' => $this->getActive()
        ];
    }
}
