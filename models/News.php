<?php


class News
{
    private $title, $description, $date, $image;


    public function __construct($title, $description, $date, $image)
    {
        $this->title = $title;
        $this->description = $description;
        $this->date = $date;
        $this->image = $image;
    }


    public function getTitle()
    {
        return $this->title;
    }


    public function getDescription()
    {
        return $this->description;
    }


    public function getDate()
    {
        return $this->date;
    }


    public function getImage()
    {
        return $this->image;
    }


}