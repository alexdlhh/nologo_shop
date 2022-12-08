<?php

namespace App\Http\Entity;

class EmployeeEntity{
    public $id;
    public $name;
    public $email;
    public $phone;
    public $charge;
    public $twitter;
    public $featuredImage;
    public $rfeg_table;

    public function __construct($id = 0, $name = '', $email = '', $phone = '', $charge = '', $twitter = '', $featuredImage = '', $rfeg_table = '')
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->charge = $charge;
        $this->twitter = $twitter;
        $this->featuredImage = $featuredImage;
        $this->rfeg_table = $rfeg_table;
    }

    /**
     * @return int $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string $email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string $phone
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @return string $charge
     */
    public function getCharge()
    {
        return $this->charge;
    }

    /**
     * @return string $twitter
     */
    public function getTwitter()
    {
        return $this->twitter;
    }

    /**
     * @return string $featuredImage
     */
    public function getFeaturedImage()
    {
        return $this->featuredImage;
    }

    /**
     * @return string $rfeg_table
     */
    public function getRfegTable()
    {
        return $this->rfeg_table;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @param string $charge
     */
    public function setCharge($charge)
    {
        $this->charge = $charge;
    }

    /**
     * @param string $twitter
     */
    public function setTwitter($twitter)
    {
        $this->twitter = $twitter;
    }

    /**
     * @param string $featuredImage
     */
    public function setFeaturedImage($featuredImage)
    {
        $this->featuredImage = $featuredImage;
    }

    /**
     * @param string $rfeg_table
     */
    public function setRfegTable($rfeg_table)
    {
        $this->rfeg_table = $rfeg_table;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'charge' => $this->charge,
            'twitter' => $this->twitter,
            'featured_image' => $this->featuredImage,
            'rfeg_table' => $this->rfeg_table
        ];
    }

}