<?php


class ShortViewInfo
{
    private $id_good, $name, $price, $image;
    private static $count;


    function __construct($id_good, $name, $price, $image)
    {
        $this->id_good = $id_good;
        $this->name = $name;
        $this->price = $price;
        $this->image = $image;
    }


    public static function getCount()
    {
        return self::$count;
    }


    public static function setCount($count): void
    {
        self::$count = $count;
    }


    public function getIdGood()
    {
        return $this->id_good;
    }


    public function getName()
    {
        return $this->name;
    }


    public function getPrice()
    {
        return $this->price;
    }


    public function getImage()
    {
        return $this->image;
    }


}