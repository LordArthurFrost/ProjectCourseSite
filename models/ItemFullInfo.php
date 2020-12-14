<?php


class ItemFullInfo
{
    private $name, $price, $description, $image, $manufacturer, $code_manufacturer, $category, $category_name, $type, $type_name, $id;

    public function __construct($name, $price, $description, $image, $manufacturer, $code_manufacturer, $category, $category_name, $type, $type_name, $id)
    {
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->image = $image;
        $this->manufacturer = $manufacturer;
        $this->code_manufacturer = $code_manufacturer;
        $this->category = $category;
        $this->category_name = $category_name;
        $this->type = $type;
        $this->type_name = $type_name;
        $this->id = $id;
    }


    public function getId()
    {
        return $this->id;
    }


    public function getName()
    {
        return $this->name;
    }


    public function getPrice()
    {
        return $this->price;
    }


    public function getDescription()
    {
        return $this->description;
    }


    public function getImage()
    {
        return $this->image;
    }


    public function getManufacturer()
    {
        return $this->manufacturer;
    }


    public function getCodeManufacturer()
    {
        return $this->code_manufacturer;
    }


    public function getCategory()
    {
        return $this->category;
    }


    public function getCategoryName()
    {
        return $this->category_name;
    }


    public function getType()
    {
        return $this->type;
    }


    public function getTypeName()
    {
        return $this->type_name;
    }

}