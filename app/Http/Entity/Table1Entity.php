<?php

namespace App\Http\Entity;

class Table1Entity{
    public $id;
    public $documento;
    public $created_at;
    public $updated_at;
    public $download_pdf;
    public $rfeg_title;
    public $order;

    public function __construct($id=0, $documento='', $created_at='', $updated_at='', $download_pdf='', $rfeg_title='', $order='')
    {
        $this->id = $id;
        $this->documento = $documento;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
        $this->download_pdf = $download_pdf;
        $this->rfeg_title = $rfeg_title;
        $this->order = $order;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getDocumento()
    {
        return $this->documento;
    }

    public function getCreated_at()
    {
        return $this->created_at;
    }

    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    public function getDownload_pdf()
    {
        return $this->download_pdf;
    }

    public function getRfeg_title()
    {
        return $this->rfeg_title;
    }

    public function getOrder()
    {
        return $this->order;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setDocumento($documento)
    {
        $this->documento = $documento;
    }

    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;
    }

    public function setUpdated_at($updated_at)
    {
        $this->updated_at = $updated_at;
    }

    public function setDownload_pdf($download_pdf)
    {
        $this->download_pdf = $download_pdf;
    }

    public function setRfeg_title($rfeg_title)
    {
        $this->rfeg_title = $rfeg_title;
    }

    public function setOrder($order)
    {
        $this->order = $order;
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'documento' => $this->documento,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'download_pdf' => $this->download_pdf,
            'rfeg_title' => $this->rfeg_title,
            'order' => $this->order,
        ];
    }
}