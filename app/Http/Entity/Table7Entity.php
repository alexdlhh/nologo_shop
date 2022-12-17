<?php

namespace App\Http\Entity;

class Table7Entity{
    public $id;
    public $image;
    public $titulo;
    public $direccion;
    public $phone;
    public $fax;
    public $web;
    public $email;
    public $rfeg_title;
    
    public function __construct($id=0, $image='', $titulo='', $direccion='', $phone='', $fax='', $web='', $email='', $rfeg_title=''){
        $this->id = $id;
        $this->image = $image;
        $this->titulo = $titulo;
        $this->direccion = $direccion;
        $this->phone = $phone;
        $this->fax = $fax;
        $this->web = $web;
        $this->email = $email;
        $this->rfeg_title = $rfeg_title;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getFax()
    {
        return $this->fax;
    }

    public function getWeb()
    {
        return $this->web;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getRfegTitle()
    {
        return $this->rfeg_title;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function setFax($fax)
    {
        $this->fax = $fax;
    }

    public function setWeb($web)
    {
        $this->web = $web;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setRfegTitle($rfeg_title)
    {
        $this->rfeg_title = $rfeg_title;
    }

    public function toArray(){
        return [
            'id' => $this->id,
            'image' => $this->image,
            'titulo' => $this->titulo,
            'direccion' => $this->direccion,
            'phone' => $this->phone,
            'fax' => $this->fax,
            'web' => $this->web,
            'email' => $this->email,
            'rfeg_title' => $this->rfeg_title,
        ];
    }

}